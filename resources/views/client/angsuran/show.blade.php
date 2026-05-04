@extends('layouts.client')
@section('title', 'Bayar Angsuran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Bayar Angsuran</div>
    <div class="page-sub">Angsuran ke-{{ $angsuran->angsuran_ke }} — {{ $angsuran->pengajuanKredit->motor->nama_motor ?? '' }}</div>
  </div>
  <a href="{{ route('client.angsuran.index') }}" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-arrow-left me-1"></i> Kembali
  </a>
</div>

<div class="row g-3" style="max-width:700px;">
  {{-- Detail Tagihan --}}
  <div class="col-12">
    <div class="card">
      <div class="card-header">Detail Tagihan</div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-sm-4">
            <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">Motor</div>
            <div style="font-weight:600;">{{ $angsuran->pengajuanKredit->motor->nama_motor ?? '-' }}</div>
          </div>
          <div class="col-sm-4">
            <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">Angsuran Ke-</div>
            <div style="font-weight:700;font-size:18px;">{{ $angsuran->angsuran_ke }}</div>
          </div>
          <div class="col-sm-4">
            <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">Total Bayar</div>
            <div style="font-size:24px;font-weight:800;color:#1969ff;">
              Rp {{ number_format($angsuran->total_bayar, 0, ',', '.') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Pilih Metode --}}
  <div class="col-12">
    <div class="card">
      <div class="card-header">Pilih Metode Pembayaran</div>
      <div class="card-body">
        @if($metodeBayar->count() > 0)
        <form action="{{ route('client.angsuran.bayar', $angsuran) }}" method="POST">
          @csrf
          <div class="d-grid gap-2 mb-4">
            @foreach($metodeBayar as $m)
            <label style="display:flex;align-items:center;gap:14px;padding:14px 16px;border:1.5px solid #e5e7eb;border-radius:10px;cursor:pointer;transition:border-color .15s;" onmouseover="this.style.borderColor='#1969ff'" onmouseout="if(!this.querySelector('input').checked)this.style.borderColor='#e5e7eb'">
              <input type="radio" name="metode" value="{{ $m->metode_pembayaran }}" id="m{{ $m->id }}" required
                     onchange="document.querySelectorAll('label[data-metode]').forEach(l=>l.style.borderColor='#e5e7eb');this.closest('label').style.borderColor='#1969ff'">
              <div>
                <div style="font-weight:600;font-size:14px;">{{ $m->metode_pembayaran }}</div>
                @if($m->tempat_bayar)
                  <div style="font-size:12px;color:#6b7280;">{{ $m->tempat_bayar }}</div>
                @endif
                @if($m->no_rekening)
                  <div style="font-size:12px;color:#6b7280;">No. Rek: <strong>{{ $m->no_rekening }}</strong></div>
                @endif
              </div>
            </label>
            @endforeach
          </div>
          <button type="submit" class="btn btn-primary w-100" style="padding:12px;font-size:15px;font-weight:700;"
                  onclick="return confirm('Konfirmasi pembayaran angsuran ke-{{ $angsuran->angsuran_ke }}?')">
            <i class="bi bi-check-circle me-2"></i>Konfirmasi Pembayaran
          </button>
        </form>
        @else
        <div class="text-center py-4 text-muted">
          <div style="font-size:32px;margin-bottom:12px;">💳</div>
          <div style="font-weight:600;margin-bottom:4px;">Belum ada metode pembayaran</div>
          <div style="font-size:13px;">Hubungi admin untuk informasi pembayaran</div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection