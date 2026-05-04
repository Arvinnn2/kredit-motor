<?php

namespace App\Http\Controllers\Ceo;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Angsuran;
use App\Models\Motor;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // Laporan periode
        $dari   = $request->dari   ?? now()->startOfMonth()->format('Y-m-d');
        $sampai = $request->sampai ?? now()->format('Y-m-d');

        // Statistik umum
        $totalPelanggan  = Pelanggan::count();
        $totalPengajuan  = PengajuanKredit::count();
        $totalPenjualan  = PengajuanKredit::whereIn('status_pengajuan', ['Diproses', 'Selesai'])->count();

        // Pendapatan dari angsuran dalam periode
        $pendapatanAngsuran = Angsuran::whereNotNull('tgl_bayar')
            ->whereBetween('tgl_bayar', [$dari, $sampai])
            ->sum('total_bayar');

        // Pendapatan DP dalam periode
        $pendapatanDP = PengajuanKredit::whereIn('status_pengajuan', ['Diproses', 'DP Dibayar', 'Selesai'])
            ->whereBetween('created_at', [$dari . ' 00:00:00', $sampai . ' 23:59:59'])
            ->sum('dp');

        $totalPendapatan = $pendapatanAngsuran + $pendapatanDP;

        // Motor paling laku
        $motorLaku = Motor::withCount(['pengajuanKredit as terjual' => function ($q) {
            $q->whereIn('status_pengajuan', ['Diproses', 'Selesai']);
        }])->orderByDesc('terjual')->take(5)->get();

        // Motor paling tidak laku
        $motorTidakLaku = Motor::withCount(['pengajuanKredit as terjual' => function ($q) {
            $q->whereIn('status_pengajuan', ['Diproses', 'Selesai']);
        }])->orderBy('terjual')->take(5)->get();

        // Kredit macet
        $kreditMacet = Angsuran::where('macet', true)
            ->with(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor'])
            ->count();

        // Laporan penjualan per bulan (6 bulan terakhir)
        $penjualanBulanan = collect();
        for ($i = 5; $i >= 0; $i--) {
            $bulan = now()->subMonths($i);
            $penjualanBulanan->push([
                'bulan'  => $bulan->format('M Y'),
                'jumlah' => PengajuanKredit::whereIn('status_pengajuan', ['Diproses', 'Selesai'])
                    ->whereMonth('created_at', $bulan->month)
                    ->whereYear('created_at', $bulan->year)
                    ->count(),
                'pendapatan' => Angsuran::whereNotNull('tgl_bayar')
                    ->whereMonth('tgl_bayar', $bulan->month)
                    ->whereYear('tgl_bayar', $bulan->year)
                    ->sum('total_bayar'),
            ]);
        }

        return view('ceo.dashboard', compact(
            'totalPelanggan', 'totalPengajuan', 'totalPenjualan',
            'pendapatanAngsuran', 'pendapatanDP', 'totalPendapatan',
            'motorLaku', 'motorTidakLaku', 'kreditMacet',
            'penjualanBulanan', 'dari', 'sampai'
        ));
    }

    public function laporanPenjualan(Request $request)
    {
        $dari   = $request->dari   ?? now()->startOfMonth()->format('Y-m-d');
        $sampai = $request->sampai ?? now()->format('Y-m-d');

        $pengajuan = PengajuanKredit::with(['pelanggan', 'motor', 'jenisCicilan'])
            ->whereIn('status_pengajuan', ['Diproses', 'Selesai', 'DP Dibayar'])
            ->whereBetween('created_at', [$dari . ' 00:00:00', $sampai . ' 23:59:59'])
            ->latest()->paginate(20);

        $totalNilai = PengajuanKredit::whereIn('status_pengajuan', ['Diproses', 'Selesai', 'DP Dibayar'])
            ->whereBetween('created_at', [$dari . ' 00:00:00', $sampai . ' 23:59:59'])
            ->sum('harga_kredit');

        return view('ceo.laporan.penjualan', compact('pengajuan', 'totalNilai', 'dari', 'sampai'));
    }

    public function kreditMacet(Request $request)
    {
        $angsuran = Angsuran::where('macet', true)
            ->with(['pengajuanKredit.pelanggan', 'pengajuanKredit.motor'])
            ->paginate(20);

        return view('ceo.laporan.kredit-macet', compact('angsuran'));
    }
}
