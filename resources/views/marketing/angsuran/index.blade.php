@extends('layouts.marketing')
@section('title', 'Angsuran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Angsuran</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Kelola pembayaran angsuran kredit</p>
  </div>
</div>

<div class="card mb-3" style="border-radius:12px;border:1px solid #e8ecf1;">
  <div class="card-body p-3">
    <form class="row g-2" method="GET">
      <div class="col-md-4">
        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select form-select-sm">
          <option value="">Semua Status</option>
          <option value="lunas" {{ request('status')=='lunas' ? 'selected' : '' }}>Sudah Bayar</option>
          <option value="belum" {{ request('status')=='belum' ? 'selected' : '' }}>Belum Bayar</option>
          <option value="macet" {{ request('status')=='macet' ? 'selected' : '' }}>Macet</option>
        </select>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm w-100" style="background:#059669;border-color:#059669;">Filter</button>
      </div>
      <div class="col-md-2">
        <a href="{{ route('marketing.angsuran.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
      </div>
    </form>
  </div>
</div>

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#f9fafb;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Pelanggan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Motor</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Angsuran Ke</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Total</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Status</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($angsuran as $i => $a)
          <tr class="{{ $a->macet ? 'table-danger' : '' }}">
            <td class="px-4 py-3">{{ $angsuran->firstItem() + $i }}</td>
            <td class="py-3">{{ $a->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</td>
            <td class="py-3">{{ $a->pengajuanKredit->motor->nama_motor ?? '-' }}</td>
            <td class="py-3 text-center">
              <span class="badge" style="background:#ede9fe;color:#7c3aed;border-radius:20px;padding:4px 10px;">Ke-{{ $a->angsuran_ke }}</span>
            </td>
            <td class="py-3 fw-semibold">Rp {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
            <td class="py-3">
              @if($a->macet)
                <span class="badge" style="background:#fee2e2;color:#dc2626;border-radius:20px;padding:4px 10px;font-size:11px;">Macet</span>
              @elseif($a->tgl_bayar)
                <span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 10px;font-size:11px;">Lunas</span>
              @else
                <span class="badge" style="background:#fef3c7;color:#d97706;border-radius:20px;padding:4px 10px;font-size:11px;">Belum</span>
              @endif
            </td>
            <td class="py-3">
              <a href="{{ route('marketing.angsuran.show', $a) }}" class="btn btn-sm btn-outline-primary me-1" style="border-radius:6px;font-size:12px;">Detail</a>
              @if($a->tgl_bayar)
              <a href="{{ route('marketing.angsuran.kwitansi', $a) }}" target="_blank" class="btn btn-sm btn-outline-success" style="border-radius:6px;font-size:12px;">
                <i class="mdi mdi-printer"></i> Kwitansi
              </a>
              @endif
            </td>
          </tr>
          @empty
          <tr><td colspan="7" class="text-center py-5 text-muted">Tidak ada data angsuran</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($angsuran->hasPages())
    <div class="px-4 py-3 border-top">{{ $angsuran->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
