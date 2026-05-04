@extends('layouts.marketing')
@section('title', 'Pengiriman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Pengiriman</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Kelola status pengiriman motor</p>
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
          <option value="Sedang Dikirim" {{ request('status')=='Sedang Dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
          <option value="Tiba Di Tujuan" {{ request('status')=='Tiba Di Tujuan' ? 'selected' : '' }}>Tiba Di Tujuan</option>
        </select>
      </div>
      <div class="col-md-2">
        <button class="btn btn-sm w-100" style="background:#059669;border-color:#059669;color:#fff;">Filter</button>
      </div>
      <div class="col-md-2">
        <a href="{{ route('marketing.pengiriman.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
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
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No Invoice</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Pelanggan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Kurir</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Tgl Kirim</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Status</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pengiriman as $i => $p)
          <tr>
            <td class="px-4 py-3 fw-medium">{{ $p->no_invoice ?? '-' }}</td>
            <td class="py-3">{{ $p->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</td>
            <td class="py-3">{{ $p->nama_kurir ?? '-' }}</td>
            <td class="py-3">{{ $p->tgl_kirim ? \Carbon\Carbon::parse($p->tgl_kirim)->format('d/m/Y') : '-' }}</td>
            <td class="py-3">
              @if($p->status_kirim === 'Tiba Di Tujuan')
                <span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 10px;font-size:11px;">Tiba</span>
              @else
                <span class="badge" style="background:#dbeafe;color:#1d4ed8;border-radius:20px;padding:4px 10px;font-size:11px;">Dikirim</span>
              @endif
            </td>
            <td class="py-3">
              <a href="{{ route('marketing.pengiriman.show', $p) }}" class="btn btn-sm btn-outline-primary" style="border-radius:6px;font-size:12px;">Detail / Edit</a>
            </td>
          </tr>
          @empty
          <tr><td colspan="6" class="text-center py-5 text-muted">Tidak ada data pengiriman</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($pengiriman->hasPages())
    <div class="px-4 py-3 border-top">{{ $pengiriman->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
