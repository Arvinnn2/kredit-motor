@extends('layouts.ceo')
@section('title', 'Data Pelanggan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Data Pelanggan</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Total {{ $pelanggan->total() }} pelanggan terdaftar</p>
  </div>
</div>

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#f9fafb;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Nama</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Telepon</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Kota</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Email</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Pengajuan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pelanggan as $i => $p)
          <tr>
            <td class="px-4 py-3">{{ $pelanggan->firstItem() + $i }}</td>
            <td class="py-3">
              <div class="d-flex align-items-center gap-2">
                <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#fcd34d);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:13px;flex-shrink:0;">
                  {{ strtoupper(substr($p->nama_pelanggan, 0, 1)) }}
                </div>
                <div>
                  <div class="fw-semibold">{{ $p->nama_pelanggan }}</div>
                  <div class="text-muted" style="font-size:11px;">{{ $p->email ?? '-' }}</div>
                </div>
              </div>
            </td>
            <td class="py-3 text-muted">{{ $p->no_telp ?? '-' }}</td>
            <td class="py-3">{{ $p->kota1 ?? '-' }}</td>
            <td class="py-3">{{ $p->email ?? '-' }}</td>
            <td class="py-3 text-center">
              <span class="badge" style="background:#fef3c7;color:#b45309;border-radius:20px;padding:4px 10px;font-weight:700;">{{ $p->pengajuan_kredit_count }}</span>
            </td>
            <td class="py-3">
              <a href="{{ route('ceo.pelanggan.show', $p) }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;font-size:12px;">Detail</a>
            </td>
          </tr>
          @empty
          <tr><td colspan="7" class="text-center py-5 text-muted">Belum ada data pelanggan</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($pelanggan->hasPages())
    <div class="px-4 py-3 border-top">{{ $pelanggan->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
