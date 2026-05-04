@extends('layouts.client')
@section('title', 'Dashboard')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Halo, {{ auth()->user()->name }} </div>
    <div class="page-sub">Selamat datang kembali di portal kredit motor Kredio</div>
  </div>
  <div style="font-size:13px;color:#9ca3af;">
    <i class="bi bi-calendar3 me-1"></i>{{ now()->translatedFormat('d F Y') }}
  </div>
</div>

@if(!$pelanggan)
<div class="alert alert-warning alert-dismissible fade show mb-4">
  <i class="bi bi-exclamation-triangle me-2"></i>
  <strong>Profil belum lengkap.</strong>
  <a href="{{ route('client.profile') }}" class="alert-link">Lengkapi sekarang</a>
  agar bisa mengajukan kredit motor.
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- STAT CARDS --}}
<div class="row g-3 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e8f0ff;">
        <i class="bi bi-file-earmark-text" style="color:#1969ff;font-size:20px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalPengajuan }}</div>
        <div class="kredio-stat-label">Total Pengajuan</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('client.pengajuan.index') }}" style="font-size:11px;color:#1969ff;text-decoration:none;font-weight:600;">
          Lihat <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fff8e6;">
        <i class="bi bi-exclamation-circle" style="color:#d97706;font-size:20px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $angsuranBelumBayar }}</div>
        <div class="kredio-stat-label">Belum Bayar</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('client.angsuran.index') }}" style="font-size:11px;color:#d97706;text-decoration:none;font-weight:600;">
          Bayar <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e6faf0;">
        <i class="bi bi-patch-check" style="color:#16a34a;font-size:20px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">
          {{ \App\Models\PengajuanKredit::where('id_pelanggan', optional(auth()->user()->pelanggan)->id)->where('status_pengajuan','Selesai')->count() }}
        </div>
        <div class="kredio-stat-label">Kredit Selesai</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#f3e8ff;">
        <i class="bi bi-bicycle" style="color:#9333ea;font-size:20px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">
          {{ \App\Models\PengajuanKredit::where('id_pelanggan', optional(auth()->user()->pelanggan)->id)->whereIn('status_pengajuan',['Diterima','Diproses'])->count() }}
        </div>
        <div class="kredio-stat-label">Kredit Aktif</div>
      </div>
    </div>
  </div>
</div>

{{-- BOTTOM SECTION --}}
<div class="row g-3">
  <div class="col-xl-4 col-lg-5">
    <div class="card h-100">
      <div class="card-header">
        <i class="bi bi-lightning-charge text-warning me-1"></i> Menu Cepat
      </div>
      <div class="card-body">
        <div class="d-grid gap-2">
          <a href="{{ route('client.motor.index') }}" class="btn btn-outline-primary btn-sm text-start d-flex align-items-center gap-2">
            <i class="bi bi-search"></i> Cari & Lihat Katalog Motor
          </a>
          <a href="{{ route('client.pengajuan.index') }}" class="btn btn-outline-secondary btn-sm text-start d-flex align-items-center gap-2">
            <i class="bi bi-file-earmark-text"></i> Pengajuan Kredit Saya
          </a>
          <a href="{{ route('client.angsuran.index') }}" class="btn btn-outline-warning btn-sm text-start d-flex align-items-center gap-2">
            <i class="bi bi-cash-stack"></i> Bayar Angsuran
          </a>
          <a href="{{ route('client.profile') }}" class="btn btn-outline-success btn-sm text-start d-flex align-items-center gap-2">
            <i class="bi bi-person-circle"></i> Profil Saya
          </a>
          @php
            $aktif = \App\Models\PengajuanKredit::where('id_pelanggan', optional(auth()->user()->pelanggan)->id)
              ->whereIn('status_pengajuan',['Diproses','DP Dibayar'])->first();
          @endphp
          @if($aktif)
          <a href="{{ route('client.tracking.show', $aktif->id) }}" class="btn btn-outline-primary btn-sm text-start d-flex align-items-center gap-2">
            <i class="bi bi-geo-alt"></i> Tracking Motor
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 col-lg-7">
    <div class="card h-100">
      <div class="card-header">
        <i class="bi bi-bar-chart-line text-primary me-1"></i> Ringkasan Kredit Saya
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-sm-6">
            <div class="p-3 rounded-3" style="background:#f0f4ff;border:1px solid #d6e2ff;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span style="font-size:12px;font-weight:600;color:#1969ff;">Total Pengajuan</span>
                <i class="bi bi-file-earmark-text" style="color:#1969ff;"></i>
              </div>
              <div style="font-size:26px;font-weight:700;color:#0d0f1a;">{{ $totalPengajuan }}</div>
              <div style="font-size:11px;color:#8a92a6;">pengajuan kredit</div>
              <div class="progress mt-2" style="height:3px;background:#d6e2ff;">
                <div class="progress-bar" style="background:#1969ff;width:{{ min(100,$totalPengajuan*15) }}%;"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3" style="background:#fffbeb;border:1px solid #fde68a;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span style="font-size:12px;font-weight:600;color:#d97706;">Angsuran Pending</span>
                <i class="bi bi-clock-history" style="color:#d97706;"></i>
              </div>
              <div style="font-size:26px;font-weight:700;color:#0d0f1a;">{{ $angsuranBelumBayar }}</div>
              <div style="font-size:11px;color:#8a92a6;">belum dibayar</div>
              <div class="progress mt-2" style="height:3px;background:#fde68a;">
                <div class="progress-bar" style="background:#d97706;width:{{ min(100,$angsuranBelumBayar*20) }}%;"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3" style="background:#f0fdf4;border:1px solid #bbf7d0;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span style="font-size:12px;font-weight:600;color:#16a34a;">Kredit Selesai</span>
                <i class="bi bi-check-circle" style="color:#16a34a;"></i>
              </div>
              <div style="font-size:26px;font-weight:700;color:#0d0f1a;">
                {{ \App\Models\PengajuanKredit::where('id_pelanggan', optional(auth()->user()->pelanggan)->id)->where('status_pengajuan','Selesai')->count() }}
              </div>
              <div style="font-size:11px;color:#8a92a6;">motor sudah lunas</div>
              <div class="progress mt-2" style="height:3px;background:#bbf7d0;">
                <div class="progress-bar" style="background:#16a34a;width:60%;"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3" style="background:#faf5ff;border:1px solid #e9d5ff;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span style="font-size:12px;font-weight:600;color:#9333ea;">Kredit Aktif</span>
                <i class="bi bi-bicycle" style="color:#9333ea;"></i>
              </div>
              <div style="font-size:26px;font-weight:700;color:#0d0f1a;">
                {{ \App\Models\PengajuanKredit::where('id_pelanggan', optional(auth()->user()->pelanggan)->id)->whereIn('status_pengajuan',['Diterima','Diproses'])->count() }}
              </div>
              <div style="font-size:11px;color:#8a92a6;">sedang berjalan</div>
              <div class="progress mt-2" style="height:3px;background:#e9d5ff;">
                <div class="progress-bar" style="background:#9333ea;width:40%;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection