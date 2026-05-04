@extends('layouts.marketing')
@section('title', 'Dashboard Marketing')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Dashboard Marketing</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><i class="mdi mdi-calendar-today me-1"></i>{{ now()->translatedFormat('d F Y') }}</p>
      </div>
    </div>
  </div>
</div>

<div class="row g-3 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#d1fae5;">
        <i class="mdi mdi-file-document-outline" style="color:#059669;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalPengajuan }}</div>
        <div class="kredio-stat-label">Total Pengajuan</div>
      </div>
      <div class="ms-auto"><a href="{{ route('marketing.pengajuan.index') }}" style="font-size:11px;color:#059669;text-decoration:none;font-weight:500;">Lihat <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fef3c7;">
        <i class="mdi mdi-clock-outline" style="color:#d97706;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $menunggu }}</div>
        <div class="kredio-stat-label">Menunggu Konfirmasi</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e8f0ff;">
        <i class="mdi mdi-cash-multiple" style="color:#1969ff;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalAngsuran }}</div>
        <div class="kredio-stat-label">Angsuran Terbayar</div>
      </div>
      <div class="ms-auto"><a href="{{ route('marketing.angsuran.index') }}" style="font-size:11px;color:#1969ff;text-decoration:none;font-weight:500;">Lihat <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fce7f3;">
        <i class="mdi mdi-truck-outline" style="color:#db2777;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalPengiriman }}</div>
        <div class="kredio-stat-label">Total Pengiriman</div>
      </div>
      <div class="ms-auto"><a href="{{ route('marketing.pengiriman.index') }}" style="font-size:11px;color:#db2777;text-decoration:none;font-weight:500;">Lihat <i class="mdi mdi-arrow-right"></i></a></div>
    </div>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Menu Cepat</h6>
        <div class="d-grid gap-2">
          <a href="{{ route('marketing.pengajuan.index') }}?status=Menunggu+Konfirmasi" class="btn btn-outline-warning btn-sm text-start">
            <i class="mdi mdi-clock-outline me-2"></i> Pengajuan Menunggu Konfirmasi ({{ $menunggu }})
          </a>
          <a href="{{ route('marketing.angsuran.index') }}?status=belum" class="btn btn-outline-danger btn-sm text-start">
            <i class="mdi mdi-cash-remove me-2"></i> Angsuran Belum Bayar
          </a>
          <a href="{{ route('marketing.pengiriman.index') }}?status=Sedang+Dikirim" class="btn btn-outline-primary btn-sm text-start">
            <i class="mdi mdi-truck-fast-outline me-2"></i> Motor Sedang Dikirim
          </a>
          <a href="{{ route('marketing.angsuran.index') }}?status=macet" class="btn btn-outline-dark btn-sm text-start">
            <i class="mdi mdi-alert-outline me-2"></i> Angsuran Macet
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Status Pengajuan</h6>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="text-muted" style="font-size:13px;">Menunggu Konfirmasi</span>
          <span class="badge" style="background:#fef3c7;color:#d97706;">{{ $menunggu }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="text-muted" style="font-size:13px;">Sedang Diproses</span>
          <span class="badge" style="background:#dbeafe;color:#1d4ed8;">{{ $diproses }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <span class="text-muted" style="font-size:13px;">Total Semua</span>
          <span class="badge" style="background:#f3f4f6;color:#374151;">{{ $totalPengajuan }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
