<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\MetodeBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AngsuranController extends Controller
{
    public function index()
    {
        $pelanggan = Auth::user()->pelanggan;

        $angsuran = Angsuran::whereHas('pengajuanKredit', function ($q) use ($pelanggan) {
            $q->where('id_pelanggan', $pelanggan->id);
        })->with('pengajuanKredit.motor')->orderBy('angsuran_ke')->paginate(10);

        return view('client.angsuran.index', compact('angsuran'));
    }

    public function show(Angsuran $angsuran)
    {
        $pelanggan = Auth::user()->pelanggan;
        abort_if($angsuran->pengajuanKredit->id_pelanggan !== $pelanggan->id, 403);

        $metodeBayar = MetodeBayar::all();
        return view('client.angsuran.show', compact('angsuran', 'metodeBayar'));
    }

    public function bayar(Request $request, Angsuran $angsuran)
    {
        $pelanggan = Auth::user()->pelanggan;
        abort_if($angsuran->pengajuanKredit->id_pelanggan !== $pelanggan->id, 403);

        $request->validate(['metode' => 'required|string']);

        $angsuran->update([
            'tgl_bayar'  => now()->toDateString(),
            'keterangan' => 'Dibayar via ' . $request->metode,
        ]);

        // Cek apakah semua angsuran sudah lunas
        $pengajuan      = $angsuran->pengajuanKredit;
        $totalAngsuran  = $pengajuan->angsuran()->count();
        $sudahLunas     = $pengajuan->angsuran()->whereNotNull('tgl_bayar')->count();

        if ($totalAngsuran > 0 && $totalAngsuran === $sudahLunas) {
            $pengajuan->update(['status_pengajuan' => 'Selesai']);
        }

        return redirect()->route('client.angsuran.index')
            ->with('success', 'Pembayaran angsuran ke-' . $angsuran->angsuran_ke . ' berhasil dicatat.' .
                ($totalAngsuran === $sudahLunas ? ' Selamat! Semua angsuran sudah lunas! 🎉' : ''));
    }

    // ── TAMBAHAN BARU ──────────────────────────────────────────
    public function buktiPembayaran(Angsuran $angsuran)
    {
        $pelanggan = Auth::user()->pelanggan;
        abort_if($angsuran->pengajuanKredit->id_pelanggan !== $pelanggan->id, 403);
        abort_if(!$angsuran->tgl_bayar, 404, 'Angsuran belum dibayar.');

        $angsuran->load(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor', 'pengajuanKredit.jenisCicilan']);
        return view('client.angsuran.bukti-pembayaran', compact('angsuran'));
    }
}