@extends('layouts.marketing')
@section('title', 'Pengajuan Kredit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Pengajuan Kredit</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Kelola semua pengajuan kredit motor</p>
  </div>
</div>

{{-- Filter --}}
<div class="card mb-3" style="border-radius:12px;border:1px solid #e8ecf1;">
  <div class="card-body p-3">
    <form class="row g-2" method="GET">
      <div class="col-md-4">
        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select form-select-sm">
          <option value="">Semua Status</option>
          @foreach(['Menunggu Konfirmasi','Diterima','DP Dibayar','Diproses','Selesai','Dibatalkan Penjual','Dibatalkan Pembeli','Bermasalah'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ $s }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm w-100" style="background:#059669;border-color:#059669;">Filter</button>
      </div>
      <div class="col-md-2">
        <a href="{{ route('marketing.pengajuan.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
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
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Tanggal</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Status</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pengajuan as $i => $p)
          <tr>
            <td class="px-4 py-3">{{ $pengajuan->firstItem() + $i }}</td>
            <td class="py-3">{{ $p->pelanggan->nama_pelanggan ?? '-' }}</td>
            <td class="py-3">{{ $p->motor->nama_motor ?? '-' }}</td>
            <td class="py-3">{{ \Carbon\Carbon::parse($p->tgl_pengajuan_kredit)->format('d/m/Y') }}</td>
            <td class="py-3">
              @php
                $colors = ['Menunggu Konfirmasi'=>'#fef3c7,#d97706','Diterima'=>'#d1fae5,#059669','DP Dibayar'=>'#dbeafe,#1d4ed8','Diproses'=>'#ede9fe,#7c3aed','Selesai'=>'#d1fae5,#065f46','Dibatalkan Penjual'=>'#fee2e2,#dc2626','Dibatalkan Pembeli'=>'#fee2e2,#dc2626','Bermasalah'=>'#fce7f3,#db2777'];
                [$bg,$tc] = explode(',', $colors[$p->status_pengajuan] ?? '#f3f4f6,#374151');
              @endphp
              <span class="badge" style="background:{{ $bg }};color:{{ $tc }};border-radius:20px;padding:4px 10px;font-size:11px;font-weight:600;">{{ $p->status_pengajuan }}</span>
            </td>
            <td class="py-3">
              <a href="{{ route('marketing.pengajuan.show', $p) }}" class="btn btn-sm btn-outline-primary" style="border-radius:6px;font-size:12px;">Detail</a>
            </td>
          </tr>
          @empty
          <tr><td colspan="6" class="text-center py-5 text-muted">Tidak ada data pengajuan</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($pengajuan->hasPages())
    <div class="px-4 py-3 border-top">{{ $pengajuan->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
