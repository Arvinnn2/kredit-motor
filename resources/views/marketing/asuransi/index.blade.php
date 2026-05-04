@extends('layouts.marketing')
@section('title', 'Asuransi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Asuransi</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Kelola data asuransi kredit motor</p>
  </div>
  <a href="{{ route('marketing.asuransi.create') }}" class="btn btn-sm" style="background:#059669;border-color:#059669;color:#fff;border-radius:8px;font-weight:600;">
    <i class="mdi mdi-plus me-1"></i> Tambah Asuransi
  </a>
</div>

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#f9fafb;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Nama Asuransi</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Margin (%)</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Keterangan</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($asuransi as $i => $a)
          <tr>
            <td class="px-4 py-3">{{ $asuransi->firstItem() + $i }}</td>
            <td class="py-3 fw-semibold">{{ $a->nama_asuransi }}</td>
            <td class="py-3"><span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 10px;">{{ $a->margin_asuransi }}%</span></td>
            <td class="py-3 text-muted">{{ $a->keterangan ?? '-' }}</td>
            <td class="py-3">
              <a href="{{ route('marketing.asuransi.edit', $a) }}" class="btn btn-sm btn-outline-primary me-1" style="border-radius:6px;font-size:12px;">Edit</a>
              <form action="{{ route('marketing.asuransi.destroy', $a) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin hapus data asuransi ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius:6px;font-size:12px;">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data asuransi</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($asuransi->hasPages())
    <div class="px-4 py-3 border-top">{{ $asuransi->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
