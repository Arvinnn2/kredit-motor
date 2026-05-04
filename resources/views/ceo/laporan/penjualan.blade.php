@extends('layouts.ceo')
@section('title', 'Laporan Penjualan')

@section('content')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Laporan Penjualan</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Periode: {{ \Carbon\Carbon::parse($dari)->format('d/m/Y') }} — {{ \Carbon\Carbon::parse($sampai)->format('d/m/Y') }}</p>
  </div>
  <form class="d-flex gap-2 align-items-end flex-wrap" method="GET">
    <div>
      <label class="form-label mb-1" style="font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;">Dari</label>
      <input type="date" name="dari" class="form-control form-control-sm" value="{{ $dari }}" style="border-radius:8px;">
    </div>
    <div>
      <label class="form-label mb-1" style="font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;">Sampai</label>
      <input type="date" name="sampai" class="form-control form-control-sm" value="{{ $sampai }}" style="border-radius:8px;">
    </div>
    <button type="submit" class="btn btn-sm" style="background:#b45309;color:#fff;border-radius:8px;font-weight:600;">Filter</button>
    <button type="button" onclick="window.print()" class="btn btn-sm btn-outline-secondary" style="border-radius:8px;">
      <i class="mdi mdi-printer me-1"></i>Cetak
    </button>
  </form>
</div>

{{-- Summary --}}
<div class="row g-3 mb-4">
  <div class="col-md-4">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fef3c7;">
        <i class="mdi mdi-file-document-multiple-outline" style="color:#d97706;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $pengajuan->total() }}</div>
        <div class="kredio-stat-label">Total Transaksi</div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#d1fae5;">
        <i class="mdi mdi-cash-multiple" style="color:#059669;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num" style="font-size:18px;">Rp {{ number_format($totalNilai, 0, ',', '.') }}</div>
        <div class="kredio-stat-label">Total Nilai Kredit</div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e8f0ff;">
        <i class="mdi mdi-chart-bar" style="color:#1969ff;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num" style="font-size:18px;">
          Rp {{ $pengajuan->total() > 0 ? number_format($totalNilai / $pengajuan->total(), 0, ',', '.') : 0 }}
        </div>
        <div class="kredio-stat-label">Rata-rata Per Transaksi</div>
      </div>
    </div>
  </div>
</div>

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#f9fafb;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Tanggal</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Pelanggan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Motor</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Cicilan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">DP</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Harga Kredit</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pengajuan as $i => $p)
          <tr>
            <td class="px-4 py-3">{{ $pengajuan->firstItem() + $i }}</td>
            <td class="py-3">{{ \Carbon\Carbon::parse($p->tgl_pengajuan_kredit)->format('d/m/Y') }}</td>
            <td class="py-3 fw-semibold">{{ $p->pelanggan->nama_pelanggan ?? '-' }}</td>
            <td class="py-3">{{ $p->motor->nama_motor ?? '-' }}</td>
            <td class="py-3">{{ $p->jenisCicilan->lama_cicilan ?? '-' }} bln</td>
            <td class="py-3">Rp {{ number_format($p->dp, 0, ',', '.') }}</td>
            <td class="py-3 fw-semibold" style="color:#059669;">Rp {{ number_format($p->harga_kredit, 0, ',', '.') }}</td>
            <td class="py-3">
              @php
                $sc = ['Diproses'=>'#ede9fe,#7c3aed','Selesai'=>'#d1fae5,#059669','DP Dibayar'=>'#dbeafe,#1d4ed8'];
                [$bg,$tc] = explode(',', $sc[$p->status_pengajuan] ?? '#f3f4f6,#374151');
              @endphp
              <span class="badge" style="background:{{ $bg }};color:{{ $tc }};border-radius:20px;padding:4px 10px;font-size:11px;">{{ $p->status_pengajuan }}</span>
            </td>
          </tr>
          @empty
          <tr><td colspan="8" class="text-center py-5 text-muted">Tidak ada data pada periode ini</td></tr>
          @endforelse
        </tbody>
        @if($pengajuan->total() > 0)
        <tfoot style="background:#f9fafb;">
          <tr>
            <td colspan="6" class="px-4 py-3 fw-bold text-end">Total Nilai Kredit:</td>
            <td class="py-3 fw-bold" style="color:#b45309;">Rp {{ number_format($totalNilai, 0, ',', '.') }}</td>
            <td></td>
          </tr>
        </tfoot>
        @endif
      </table>
    </div>
    @if($pengajuan->hasPages())
    <div class="px-4 py-3 border-top">{{ $pengajuan->withQueryString()->links() }}</div>
    @endif
  </div>
</div>

@push('styles')
<style>@media print { .sidebar, .navbar, footer, form, .pagination { display:none!important; } .main-panel { margin:0!important; width:100%!important; } }</style>
@endpush
@endsection
