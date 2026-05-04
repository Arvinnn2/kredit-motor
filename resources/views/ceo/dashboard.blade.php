@extends('layouts.ceo')
@section('title', 'Dashboard CEO')

@push('styles')
<script src="{{ asset('staradmin/assets/vendors/chart.js/chart.umd.js') }}"></script>
@endpush

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
      <div>
        <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Dashboard CEO</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><i class="mdi mdi-calendar-today me-1"></i>{{ now()->translatedFormat('d F Y') }}</p>
      </div>
      {{-- Filter Periode --}}
      <form class="d-flex gap-2 align-items-center" method="GET">
        <div>
          <label style="font-size:11px;color:#6b7280;font-weight:600;text-transform:uppercase;">Dari</label>
          <input type="date" name="dari" class="form-control form-control-sm" value="{{ $dari }}" style="border-radius:8px;">
        </div>
        <div>
          <label style="font-size:11px;color:#6b7280;font-weight:600;text-transform:uppercase;">Sampai</label>
          <input type="date" name="sampai" class="form-control form-control-sm" value="{{ $sampai }}" style="border-radius:8px;">
        </div>
        <div class="align-self-end">
          <button type="submit" class="btn btn-sm" style="background:#b45309;color:#fff;border-radius:8px;">Filter</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fef3c7;">
        <i class="mdi mdi-currency-usd" style="color:#d97706;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num" style="font-size:18px;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        <div class="kredio-stat-label">Total Pendapatan (Periode)</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#d1fae5;">
        <i class="mdi mdi-motorbike" style="color:#059669;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalPenjualan }}</div>
        <div class="kredio-stat-label">Motor Terjual</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e8f0ff;">
        <i class="mdi mdi-account-group-outline" style="color:#1969ff;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalPelanggan }}</div>
        <div class="kredio-stat-label">Total Pelanggan</div>
      </div>
      <div class="ms-auto"><a href="{{ route('ceo.pelanggan.index') }}" style="font-size:11px;color:#1969ff;text-decoration:none;font-weight:500;">Lihat <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fee2e2;">
        <i class="mdi mdi-alert-circle-outline" style="color:#dc2626;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $kreditMacet }}</div>
        <div class="kredio-stat-label">Kredit Macet</div>
      </div>
      <div class="ms-auto"><a href="{{ route('ceo.laporan.kredit-macet') }}" style="font-size:11px;color:#dc2626;text-decoration:none;font-weight:500;">Lihat <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
  </div>
</div>

{{-- Pendapatan Breakdown --}}
<div class="row g-3 mb-4">
  <div class="col-md-4">
    <div class="card h-100" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Rincian Pendapatan Periode</h6>
        <div class="d-flex justify-content-between py-2 border-bottom">
          <span class="text-muted" style="font-size:13px;">Dari Angsuran</span>
          <span class="fw-semibold" style="color:#059669;">Rp {{ number_format($pendapatanAngsuran, 0, ',', '.') }}</span>
        </div>
        <div class="d-flex justify-content-between py-2 border-bottom">
          <span class="text-muted" style="font-size:13px;">Dari DP</span>
          <span class="fw-semibold" style="color:#1969ff;">Rp {{ number_format($pendapatanDP, 0, ',', '.') }}</span>
        </div>
        <div class="d-flex justify-content-between pt-2">
          <span class="fw-bold" style="font-size:13px;">Total</span>
          <span class="fw-bold" style="color:#b45309;font-size:15px;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</span>
        </div>
        <div class="mt-3">
          <a href="{{ route('ceo.laporan.penjualan') }}?dari={{ $dari }}&sampai={{ $sampai }}" class="btn btn-sm w-100" style="background:#fef3c7;color:#b45309;border:none;border-radius:8px;font-weight:600;">
            <i class="mdi mdi-file-chart-outline me-1"></i> Lihat Laporan Lengkap
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card h-100" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Grafik Penjualan 6 Bulan Terakhir</h6>
        <canvas id="penjualanChart" height="120"></canvas>
      </div>
    </div>
  </div>
</div>

{{-- Motor Laku & Tidak Laku --}}
<div class="row g-3 mb-4">
  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Motor Paling Laku</h6>
        @forelse($motorLaku as $i => $m)
        <div class="d-flex justify-content-between align-items-center {{ !$loop->last ? 'mb-3 pb-3 border-bottom' : '' }}">
          <div class="d-flex align-items-center gap-3">
            <div style="width:32px;height:32px;border-radius:50%;background:{{ ['#fef3c7','#f3f4f6','#fef3c7','#f3f4f6','#f3f4f6'][$i] ?? '#f3f4f6' }};display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:#b45309;">
              {{ $i + 1 }}
            </div>
            <div>
              <div class="fw-semibold" style="font-size:13px;">{{ $m->nama_motor }}</div>
              <div class="text-muted" style="font-size:11px;">{{ $m->merk }}</div>
            </div>
          </div>
          <span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 12px;font-weight:700;">{{ $m->terjual }} unit</span>
        </div>
        @empty
        <div class="text-center py-4 text-muted" style="font-size:13px;">Belum ada data penjualan</div>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Motor Kurang Diminati</h6>
        @forelse($motorTidakLaku as $i => $m)
        <div class="d-flex justify-content-between align-items-center {{ !$loop->last ? 'mb-3 pb-3 border-bottom' : '' }}">
          <div class="d-flex align-items-center gap-3">
            <div style="width:32px;height:32px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:#dc2626;">
              {{ $i + 1 }}
            </div>
            <div>
              <div class="fw-semibold" style="font-size:13px;">{{ $m->nama_motor }}</div>
              <div class="text-muted" style="font-size:11px;">{{ $m->merk }}</div>
            </div>
          </div>
          <span class="badge" style="background:#fee2e2;color:#dc2626;border-radius:20px;padding:4px 12px;font-weight:700;">{{ $m->terjual }} unit</span>
        </div>
        @empty
        <div class="text-center py-4 text-muted" style="font-size:13px;">Belum ada data</div>
        @endforelse
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
const labels = {!! json_encode($penjualanBulanan->pluck('bulan')) !!};
const dataJumlah = {!! json_encode($penjualanBulanan->pluck('jumlah')) !!};
const dataPendapatan = {!! json_encode($penjualanBulanan->pluck('pendapatan')) !!};

const ctx = document.getElementById('penjualanChart').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels,
    datasets: [
      {
        label: 'Unit Terjual',
        data: dataJumlah,
        backgroundColor: 'rgba(180, 83, 9, 0.15)',
        borderColor: '#b45309',
        borderWidth: 2,
        borderRadius: 6,
        yAxisID: 'y',
      },
      {
        label: 'Pendapatan Angsuran',
        data: dataPendapatan,
        type: 'line',
        borderColor: '#059669',
        backgroundColor: 'rgba(5, 150, 105, 0.1)',
        borderWidth: 2,
        pointRadius: 4,
        fill: true,
        tension: 0.4,
        yAxisID: 'y1',
      }
    ]
  },
  options: {
    responsive: true,
    interaction: { mode: 'index', intersect: false },
    plugins: { legend: { labels: { font: { size: 12 }, boxWidth: 12 } } },
    scales: {
      y: { position: 'left', beginAtZero: true, grid: { color: '#f3f4f6' }, ticks: { font: { size: 11 }, precision: 0 } },
      y1: { position: 'right', beginAtZero: true, grid: { drawOnChartArea: false }, ticks: { font: { size: 11 }, callback: v => 'Rp ' + (v/1000000).toFixed(1) + 'jt' } },
    }
  }
});
</script>
@endpush
@endsection
