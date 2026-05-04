<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    public function show($kreditId)
    {
        $pengajuan = PengajuanKredit::with(['pelanggan', 'motor', 'pengiriman'])
            ->findOrFail($kreditId);

        // Pastikan ini milik client yang login
        $user = Auth::user();
        if ($pengajuan->pelanggan->email !== $user->email) {
            abort(403);
        }

        $pengiriman = $pengajuan->pengiriman;

        return view('client.tracking.show', compact('pengajuan', 'pengiriman'));
    }
}
