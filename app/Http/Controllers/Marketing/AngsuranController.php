<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\Kredit;
use App\Models\PengajuanKredit;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index(Request $request)
    {
        $query = Angsuran::with(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor']);

        if ($request->status === 'lunas') {
            $query->whereNotNull('tgl_bayar');
        } elseif ($request->status === 'belum') {
            $query->whereNull('tgl_bayar');
        } elseif ($request->status === 'macet') {
            $query->where('macet', true);
        }

        if ($request->search) {
            $query->whereHas('pengajuanKredit.pelanggan', function ($q) use ($request) {
                $q->where('nama_pelanggan', 'like', '%' . $request->search . '%');
            });
        }

        $angsuran = $query->latest()->paginate(15);
        return view('marketing.angsuran.index', compact('angsuran'));
    }

    public function show(Angsuran $angsuran)
    {
        $angsuran->load(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor', 'pengajuanKredit.jenisCicilan', 'pengajuanKredit.kredit']);
        return view('marketing.angsuran.show', compact('angsuran'));
    }

    public function update(Request $request, Angsuran $angsuran)
    {
        $request->validate([
            'tgl_bayar'  => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'macet'      => 'boolean',
        ]);

        $sudahBayarSebelum = $angsuran->tgl_bayar ? true : false;

        $angsuran->update([
            'tgl_bayar'  => $request->tgl_bayar,
            'keterangan' => $request->keterangan,
            'macet'      => $request->boolean('macet'),
        ]);

        // Update sisa kredit & status kredit di tabel kredit
        $pengajuan = $angsuran->pengajuanKredit;
        $kredit    = $pengajuan->kredit;

        if ($kredit) {
            $totalSudahBayar = $pengajuan->angsuran()->whereNotNull('tgl_bayar')->sum('total_bayar');
            $totalKredit     = ($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan) * $pengajuan->jenisCicilan->lama_cicilan;
            $sisa            = max(0, $totalKredit - $totalSudahBayar);

            // Cek apakah semua angsuran sudah lunas
            $totalAngsuran = $pengajuan->angsuran()->count();
            $lunas         = $pengajuan->angsuran()->whereNotNull('tgl_bayar')->count();
            $adaMacet      = $pengajuan->angsuran()->where('macet', true)->exists();

            $statusKredit = 'Dicicil';
            if ($lunas === $totalAngsuran) $statusKredit = 'Lunas';
            elseif ($adaMacet)             $statusKredit = 'Macet';

            $kredit->update([
                'sisa_kredit'   => $sisa,
                'status_kredit' => $statusKredit,
            ]);

            // Update status pengajuan jika lunas
            if ($statusKredit === 'Lunas') {
                $pengajuan->update(['status_pengajuan' => 'Selesai']);
            }
        }

        return redirect()->route('marketing.angsuran.show', $angsuran)
            ->with('success', 'Status angsuran berhasil diperbarui.');
    }

    public function tandaiMacet(Angsuran $angsuran)
    {
        $angsuran->update(['macet' => !$angsuran->macet]);

        // Sync status kredit
        $kredit = $angsuran->pengajuanKredit->kredit;
        if ($kredit) {
            $adaMacet = $angsuran->pengajuanKredit->angsuran()->where('macet', true)->exists();
            $kredit->update(['status_kredit' => $adaMacet ? 'Macet' : 'Dicicil']);
        }

        return back()->with('success', $angsuran->macet ? 'Angsuran ditandai macet.' : 'Tanda macet dilepas.');
    }

    public function cetakKwitansi(Angsuran $angsuran)
    {
        $angsuran->load(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor', 'pengajuanKredit.jenisCicilan']);
        return view('marketing.kwitansi.print', compact('angsuran'));
    }
}
