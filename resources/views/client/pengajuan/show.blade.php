@extends('layouts.client')
@section('title', 'Detail Pengajuan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Detail Pengajuan</div>
    <div class="page-sub">{{ $pengajuan->motor->nama_motor ?? '-' }}</div>
  </div>
  <a href="{{ route('client.pengajuan.index') }}" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-arrow-left me-1"></i> Kembali
  </a>
</div>

{{-- Status Tracker --}}
<div class="card mb-3">
  <div class="card-body">
    @php
      $st = $pengajuan->status_pengajuan;
      if ($st === 'Selesai') { $activeStep = 3; }
      elseif (in_array($st, ['Diproses'])) { $activeStep = 2; }
      elseif (in_array($st, ['Diterima','DP Dibayar'])) { $activeStep = 1; }
      else { $activeStep = 0; }
      $steps = ['Dikonfirmasi','Diproses','Selesai'];
    @endphp
    <div class="status-steps">
      @foreach($steps as $i => $step)
      <div class="status-step">
        <div class="step-dot {{ $i < $activeStep ? 'done' : ($i === $activeStep ? 'active' : '') }}">
          @if($i < $activeStep)<i class="bi bi-check" style="font-size:12px;"></i>
          @else{{ $i + 1 }}@endif
        </div>
        <div class="step-label {{ $i === $activeStep ? 'active' : '' }}">{{ $step }}</div>
      </div>
      @endforeach
    </div>

    {{-- TOMBOL BAYAR DP — muncul jika status Diterima --}}
    @if($st === 'Diterima')
    <div style="text-align:center;margin-top:20px;padding:20px;background:#f0f4ff;border-radius:12px;border:1px solid #d6e2ff;">
      <div style="font-size:13.5px;color:#d97706;font-weight:600;margin-bottom:12px;">
        <i class="bi bi-exclamation-circle me-1"></i>
        Pengajuan disetujui! Silakan lakukan pembayaran DP.
      </div>
      <a href="{{ route('client.midtrans.bayar-dp', $pengajuan) }}"
         class="btn btn-primary"
         style="padding:12px 28px;font-size:15px;font-weight:700;border-radius:12px;box-shadow:0 4px 14px rgba(25,105,255,.25);">
        <i class="bi bi-credit-card me-2"></i>
        Bayar DP Sekarang — Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}
      </a>
    </div>
    @endif

    {{-- Menunggu verifikasi DP --}}
    @if($st === 'DP Dibayar')
    <div style="text-align:center;margin-top:16px;padding:16px;background:#f0fdf4;border-radius:10px;border:1px solid #bbf7d0;">
      <i class="bi bi-clock-history" style="font-size:20px;color:#16a34a;"></i>
      <div style="font-size:13.5px;color:#166534;font-weight:600;margin-top:6px;">
        DP sudah dibayar! Menunggu verifikasi admin.
      </div>
      <div style="font-size:12px;color:#6b7280;margin-top:4px;">
        Admin akan mengaktifkan kredit dan membuat jadwal angsuran.
      </div>
    </div>
    @endif

    {{-- Selesai --}}
    @if($st === 'Selesai')
    <div class="text-center mt-3">
      <div style="font-size:28px;">🎉</div>
      <div style="font-size:14px;font-weight:600;color:#16a34a;margin-top:4px;">
        Kredit Lunas! Motor sudah resmi milik Anda.
      </div>
    </div>
    @endif

    {{-- Dibatalkan / Bermasalah --}}
    @if(in_array($st, ['Dibatalkan Penjual','Dibatalkan Pembeli','Bermasalah']))
    <div class="text-center mt-3">
      <span class="badge bg-danger px-3 py-2">{{ $st }}</span>
    </div>
    @endif

    @if($pengajuan->keterangan_status_pengajuan)
    <div class="text-center mt-2" style="font-size:12px;color:#6b7280;">
      Catatan: {{ $pengajuan->keterangan_status_pengajuan }}
    </div>
    @endif
  </div>
</div>

<div class="row g-3">
  {{-- Detail Motor & Kredit --}}
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">Detail Motor &amp; Kredit</div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Motor</dt>
          <dd class="col-sm-7" style="font-weight:500;">{{ $pengajuan->motor->nama_motor ?? '-' }}</dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Harga Cash</dt>
          <dd class="col-sm-7" style="font-weight:500;">Rp {{ number_format($pengajuan->harga_cash, 0, ',', '.') }}</dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Uang Muka (DP)</dt>
          <dd class="col-sm-7" style="font-weight:600;color:{{ $pengajuan->dp > 0 ? '#0d0f1a' : '#9ca3af' }};">
            {{ $pengajuan->dp > 0 ? 'Rp '.number_format($pengajuan->dp, 0, ',', '.') : 'Menunggu penetapan admin' }}
          </dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Lama Cicilan</dt>
          <dd class="col-sm-7" style="font-weight:500;">{{ $pengajuan->jenisCicilan->lama_cicilan ?? '-' }} bulan</dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Asuransi/Bulan</dt>
          <dd class="col-sm-7" style="font-weight:500;">Rp {{ number_format($pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}</dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Cicilan/Bulan</dt>
          <dd class="col-sm-7" style="font-weight:700;color:#1969ff;font-size:15px;">
            {{ $pengajuan->cicilan_perbulan > 0 ? 'Rp '.number_format($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan, 0, ',', '.') : 'Dihitung setelah DP ditetapkan' }}
          </dd>

          <dt class="col-sm-5" style="font-size:12px;color:#6b7280;">Tanggal Pengajuan</dt>
          <dd class="col-sm-7" style="font-weight:500;">{{ \Carbon\Carbon::parse($pengajuan->tgl_pengajuan_kredit)->format('d/m/Y') }}</dd>
        </dl>
      </div>
    </div>
  </div>

  {{-- Jadwal Angsuran --}}
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between align-items-center">
        Jadwal Angsuran
        @if($pengajuan->angsuran->count() > 0)
          <span style="font-size:12px;color:#6b7280;">
            {{ $pengajuan->angsuran->whereNotNull('tgl_bayar')->count() }}/{{ $pengajuan->angsuran->count() }} lunas
          </span>
        @endif
      </div>
      <div class="card-body" style="padding:0 !important;">
        @if($pengajuan->angsuran->count() > 0)
          <div style="max-height:280px;overflow-y:auto;">
            <table class="table" style="margin-bottom:0;font-size:13px;">
              <thead>
                <tr><th>Ke-</th><th>Total</th><th>Jatuh Tempo</th><th>Status</th></tr>
              </thead>
              <tbody>
                @foreach($pengajuan->angsuran->sortBy('angsuran_ke') as $a)
                <tr>
                  <td><strong>{{ $a->angsuran_ke }}</strong></td>
                  <td>Rp {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
                  <td style="font-size:12px;color:#6b7280;">{{ $a->keterangan ?? '-' }}</td>
                  <td>
                    @if($a->tgl_bayar)
                      <span style="font-size:11px;font-weight:700;padding:3px 8px;border-radius:5px;background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;">Lunas</span>
                    @else
                      <span style="font-size:11px;font-weight:700;padding:3px 8px;border-radius:5px;background:#fff8e6;color:#d97706;border:1px solid #fde68a;">Belum</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div style="padding:10px 16px;border-top:1px solid #f3f4f6;">
            <a href="{{ route('client.angsuran.index') }}" style="font-size:13px;color:#1969ff;text-decoration:none;font-weight:600;">
              Lihat &amp; bayar angsuran <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        @else
          <div style="padding:32px;text-align:center;color:#9ca3af;">
            <div style="font-size:32px;margin-bottom:10px;">📋</div>
            <div style="font-size:13px;">Jadwal angsuran belum tersedia.<br>Menunggu konfirmasi admin.</div>
          </div>
        @endif
      </div>
    </div>
  </div>

  {{-- Info Pengiriman --}}
  @if($pengajuan->pengiriman)
  <div class="col-12">
    <div class="card">
      <div class="card-header"><i class="bi bi-truck me-2"></i>Status Pengiriman</div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3">
            <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">No. Invoice</div>
            <div style="font-weight:600;">{{ $pengajuan->pengiriman->no_invoice ?? '-' }}</div>
          </div>
          <div class="col-md-3">
            <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Kurir</div>
            <div style="font-weight:600;">{{ $pengajuan->pengiriman->nama_kurir ?? 'Belum diisi' }}</div>
          </div>
          <div class="col-md-3">
            <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Status Kirim</div>
            <span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:6px;
              background:{{ $pengajuan->pengiriman->status_kirim === 'Tiba Di Tujuan' ? '#f0fdf4' : '#fff8e6' }};
              color:{{ $pengajuan->pengiriman->status_kirim === 'Tiba Di Tujuan' ? '#16a34a' : '#d97706' }};
              border:1px solid {{ $pengajuan->pengiriman->status_kirim === 'Tiba Di Tujuan' ? '#bbf7d0' : '#fde68a' }};">
              {{ $pengajuan->pengiriman->status_kirim }}
            </span>
          </div>
          <div class="col-md-3">
            <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Keterangan</div>
            <div style="font-weight:600;">{{ $pengajuan->pengiriman->keterangan ?? '-' }}</div>
          </div>
        </div>
        <div class="mt-3">
          <a href="{{ route('client.tracking.show', $pengajuan->id) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-geo-alt me-1"></i> Tracking Pengiriman Detail
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection