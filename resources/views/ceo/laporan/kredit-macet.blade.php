@extends('layouts.ceo')
@section('title', 'Kredit Macet')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Laporan Kredit Macet</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Daftar angsuran yang ditandai macet oleh marketing</p>
  </div>
  <button onclick="window.print()" class="btn btn-sm btn-outline-secondary" style="border-radius:8px;">
    <i class="mdi mdi-printer me-1"></i>Cetak
  </button>
</div>

@if($angsuran->total() > 0)
<div class="alert" style="background:#fef2f2;border:1px solid #fecaca;border-radius:10px;color:#991b1b;padding:14px 18px;">
  <i class="mdi mdi-alert-circle-outline me-2"></i>
  Ditemukan <strong>{{ $angsuran->total() }}</strong> angsuran macet. Segera lakukan tindak lanjut.
</div>
@else
<div class="alert" style="background:#f0fdf4;border:1px solid #a7f3d0;border-radius:10px;color:#065f46;padding:14px 18px;">
  <i class="mdi mdi-check-circle-outline me-2"></i>Tidak ada kredit macet saat ini.
</div>
@endif

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#fef2f2;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Pelanggan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Telepon</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Motor</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Angsuran Ke</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Jumlah</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @forelse($angsuran as $i => $a)
          <tr class="table-danger">
            <td class="px-4 py-3">{{ $angsuran->firstItem() + $i }}</td>
            <td class="py-3 fw-semibold">{{ $a->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</td>
            <td class="py-3">{{ $a->pengajuanKredit->pelanggan->telepon ?? '-' }}</td>
            <td class="py-3">{{ $a->pengajuanKredit->motor->nama_motor ?? '-' }}</td>
            <td class="py-3 text-center">
              <span class="badge" style="background:#fee2e2;color:#dc2626;border-radius:20px;padding:4px 10px;font-weight:700;">Ke-{{ $a->angsuran_ke }}</span>
            </td>
            <td class="py-3 fw-bold" style="color:#dc2626;">Rp {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
            <td class="py-3 text-muted">{{ $a->keterangan ?? '-' }}</td>
          </tr>
          @empty
          <tr><td colspan="7" class="text-center py-5 text-muted">Tidak ada data kredit macet</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($angsuran->hasPages())
    <div class="px-4 py-3 border-top">{{ $angsuran->withQueryString()->links() }}</div>
    @endif
  </div>
</div>

@push('styles')
<style>@media print { .sidebar, .navbar, footer, button { display:none!important; } .main-panel { margin:0!important; width:100%!important; } }</style>
@endpush
@endsection
