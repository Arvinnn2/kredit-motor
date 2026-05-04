<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Angsuran;
use App\Models\Pengiriman;
use App\Models\Asuransi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengajuan  = PengajuanKredit::count();
        $menunggu        = PengajuanKredit::where('status_pengajuan', 'Menunggu Konfirmasi')->count();
        $diproses        = PengajuanKredit::where('status_pengajuan', 'Diproses')->count();
        $totalAngsuran   = Angsuran::whereNotNull('tgl_bayar')->count();
        $totalPengiriman = Pengiriman::count();

        return view('marketing.dashboard', compact(
            'totalPengajuan', 'menunggu', 'diproses', 'totalAngsuran', 'totalPengiriman'
        ));
    }
}
