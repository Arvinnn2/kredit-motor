@extends('layouts.client')
@section('title', 'Angsuran Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Angsuran Saya</div>
    <div class="page-sub">Daftar tagihan cicilan kredit motor Anda</div>
  </div>
</div>

<div class="card">
  <div class="card-body p-0 !important" style="padding:0 !important;">
    <div style="overflow-x:auto;">
      <table class="table" style="margin-bottom:0;">
        <thead>
          <tr>
            <th>Motor</th>
            <th>Angsuran Ke-</th>
            <th>Total Bayar</th>
            <th>Tgl Bayar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($angsuran as $a)
          <tr>
            <td>
              <div style="font-weight:600;">{{ $a->pengajuanKredit->motor->nama_motor ?? '-' }}</div>
            </td>
            <td>
              <span style="font-weight:700;font-size:14px;">{{ $a->angsuran_ke }}</span>
            </td>
            <td style="font-weight:700;color:#1969ff;">
              Rp {{ number_format($a->total_bayar, 0, ',', '.') }}
            </td>
            <td>
              {{ $a->tgl_bayar ? \Carbon\Carbon::parse($a->tgl_bayar)->format('d/m/Y') : '-' }}
            </td>
            <td>
              @if($a->tgl_bayar)
                <span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:6px;background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;">Lunas</span>
              @else
                <span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:6px;background:#fff8e6;color:#d97706;border:1px solid #fde68a;">Belum Bayar</span>
              @endif
            </td>
            <td>
              @if(!$a->tgl_bayar)
                <a href="{{ route('client.midtrans.bayar-angsuran', $a) }}" class="btn btn-sm btn-primary">
                  <i class="bi bi-credit-card me-1"></i>Bayar
                </a>
              @else
                <a href="{{ route('client.angsuran.bukti', $a) }}" class="btn btn-sm btn-outline-success">
                  <i class="bi bi-receipt me-1"></i>Bukti
                </a>
              @endif
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              <div style="font-size:40px;margin-bottom:12px;">💳</div>
              <div style="font-weight:600;margin-bottom:6px;">Belum ada data angsuran</div>
              <div style="font-size:13px;">Angsuran akan muncul setelah pengajuan kredit disetujui</div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($angsuran->hasPages())
    <div style="padding:12px 20px;border-top:1px solid #f3f4f6;">{{ $angsuran->links() }}</div>
    @endif
  </div>
</div>
@endsection