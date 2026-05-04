<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Angsuran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pelanggan        = Auth::user()->pelanggan;
        $totalPengajuan   = 0;
        $angsuranBelumBayar = 0;

        if ($pelanggan) {
            $totalPengajuan = PengajuanKredit::where('id_pelanggan', $pelanggan->id)->count();
            $angsuranBelumBayar = Angsuran::whereHas('pengajuanKredit', function ($q) use ($pelanggan) {
                $q->where('id_pelanggan', $pelanggan->id);
            })->whereNull('tgl_bayar')->count();
        }

        return view('client.dashboard', compact('pelanggan', 'totalPengajuan', 'angsuranBelumBayar'));
    }
}