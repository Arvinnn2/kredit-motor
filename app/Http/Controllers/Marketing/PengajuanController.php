<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Motor;
use App\Models\Kredit;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $query = PengajuanKredit::with(['pelanggan', 'motor']);

        if ($request->status) {
            $query->where('status_pengajuan', $request->status);
        }
        if ($request->search) {
            $query->whereHas('pelanggan', function ($q) use ($request) {
                $q->where('nama_pelanggan', 'like', '%' . $request->search . '%');
            });
        }

        $pengajuan = $query->latest()->paginate(15);
        return view('marketing.pengajuan.index', compact('pengajuan'));
    }

    public function show(PengajuanKredit $pengajuan)
    {
        $pengajuan->load(['pelanggan', 'motor', 'jenisCicilan', 'asuransi', 'angsuran', 'pengiriman', 'kredit']);
        return view('marketing.pengajuan.show', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        // DP sudah dihitung otomatis saat client mengajukan
        $request->validate([
            'keterangan' => 'nullable|string|max:255',
        ]);

        $pengajuan = PengajuanKredit::with(['jenisCicilan', 'asuransi', 'motor'])->findOrFail($id);

        $pengajuan->update([
            'status_pengajuan'            => 'Diterima',
            'keterangan_status_pengajuan' => $request->keterangan
                ?? 'Pengajuan disetujui. Silakan bayar DP sebesar Rp '
                   . number_format($pengajuan->dp, 0, ',', '.'),
        ]);

        return redirect()->route('marketing.pengajuan.show', $pengajuan)
            ->with('success', 'Pengajuan disetujui! DP sebesar Rp '
                . number_format($pengajuan->dp, 0, ',', '.'));
    }

    public function approveDP(Request $request, $id)
    {
        $pengajuan = PengajuanKredit::with(['jenisCicilan', 'motor'])->findOrFail($id);

        if ($pengajuan->status_pengajuan !== 'DP Dibayar') {
            return redirect()->route('marketing.pengajuan.show', $pengajuan)
                ->with('error', 'Status harus "DP Dibayar" untuk melanjutkan.');
        }

        $motor = Motor::findOrFail($pengajuan->id_motor);
        if ($motor->stok <= 0) {
            return redirect()->route('marketing.pengajuan.show', $pengajuan)
                ->with('error', 'Stok motor sudah habis.');
        }
        $motor->decrement('stok');

        $pengajuan->update([
            'status_pengajuan'            => 'Diproses',
            'keterangan_status_pengajuan' => 'DP terverifikasi. Kredit aktif. Angsuran dimulai bulan depan.',
        ]);

        // Buat jadwal angsuran
        $lama          = $pengajuan->jenisCicilan->lama_cicilan;
        $totalPerBulan = round($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan);

        for ($i = 1; $i <= $lama; $i++) {
            $jatuhTempo = now()->addMonths($i)->startOfMonth();
            $pengajuan->angsuran()->create([
                'angsuran_ke' => $i,
                'total_bayar' => $totalPerBulan,
                'keterangan'  => 'Jatuh tempo ' . $jatuhTempo->format('d/m/Y'),
            ]);
        }

        // Buat record di tabel kredit
        $totalKredit = $totalPerBulan * $lama;
        Kredit::create([
            'id_pengajuan_kredit'       => $pengajuan->id,
            'tgl_mulai_kredit'          => now()->addMonth()->startOfMonth()->toDateString(),
            'tgl_selesai_kredit'        => now()->addMonths($lama + 1)->startOfMonth()->toDateString(),
            'sisa_kredit'               => $totalKredit,
            'status_kredit'             => 'Dicicil',
            'keterangan_status_kredit'  => 'Kredit aktif. Total ' . $lama . ' angsuran.',
        ]);

        // Buat pengiriman
        $pengajuan->pengiriman()->create([
            'no_invoice'   => 'INV-' . date('Ymd') . '-' . str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT),
            'status_kirim' => 'Sedang Dikirim',
            'keterangan'   => 'Motor dalam proses pengiriman ke alamat pelanggan.',
        ]);

        return redirect()->route('marketing.pengajuan.show', $pengajuan)
            ->with('success', 'Kredit diaktifkan! Stok berkurang 1. Jadwal angsuran berhasil dibuat.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate(['keterangan' => 'required|string']);

        $pengajuan = PengajuanKredit::findOrFail($id);
        $pengajuan->update([
            'status_pengajuan'            => 'Dibatalkan Penjual',
            'keterangan_status_pengajuan' => $request->keterangan,
        ]);

        return redirect()->route('marketing.pengajuan.show', $pengajuan)
            ->with('success', 'Pengajuan berhasil ditolak.');
    }
}
