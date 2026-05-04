@extends('layouts.admin')
@section('title', 'Dashboard Admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Dashboard Admin</h4>
      </div>
      <div>
        <span class="text-muted" style="font-size:13px;">
          <i class="mdi mdi-calendar-today me-1"></i>{{ now()->translatedFormat('d F Y') }}
        </span>
      </div>
    </div>
  </div>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#e8f0ff;">
        <i class="mdi mdi-motorbike" style="color:#1969ff;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalMotor }}</div>
        <div class="kredio-stat-label">Total Motor</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('admin.motor.index') }}" style="font-size:11px;color:#1969ff;text-decoration:none;font-weight:600;">
          Kelola <i class="mdi mdi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#d1fae5;">
        <i class="mdi mdi-tag-multiple-outline" style="color:#059669;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalJenisMotor }}</div>
        <div class="kredio-stat-label">Jenis Motor</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('admin.jenis-motor.index') }}" style="font-size:11px;color:#059669;text-decoration:none;font-weight:600;">
          Kelola <i class="mdi mdi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fef3c7;">
        <i class="mdi mdi-account-cog-outline" style="color:#d97706;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">{{ $totalUsers }}</div>
        <div class="kredio-stat-label">Total User</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('admin.users.index') }}" style="font-size:11px;color:#d97706;text-decoration:none;font-weight:600;">
          Kelola <i class="mdi mdi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="kredio-stat-card">
      <div class="kredio-stat-icon" style="background:#fce7f3;">
        <i class="mdi mdi-image-edit-outline" style="color:#db2777;font-size:24px;"></i>
      </div>
      <div>
        <div class="kredio-stat-num">Hero</div>
        <div class="kredio-stat-label">Banner Home</div>
      </div>
      <div class="ms-auto">
        <a href="{{ route('admin.hero.index') }}" style="font-size:11px;color:#db2777;text-decoration:none;font-weight:600;">
          Edit <i class="mdi mdi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Akses Cepat</h6>
        <div class="d-grid gap-2">
          <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-danger btn-sm text-start">
            <i class="mdi mdi-image-edit-outline me-2"></i> Edit Hero Banner Home
          </a>
          <a href="{{ route('admin.motor.create') }}" class="btn btn-outline-primary btn-sm text-start">
            <i class="mdi mdi-plus me-2"></i> Tambah Motor Baru
          </a>
          <a href="{{ route('admin.jenis-motor.create') }}" class="btn btn-outline-success btn-sm text-start">
            <i class="mdi mdi-plus me-2"></i> Tambah Jenis Motor
          </a>
          <a href="{{ route('admin.users.create') }}" class="btn btn-outline-warning btn-sm text-start">
            <i class="mdi mdi-account-plus-outline me-2"></i> Buat Akun Marketing / CEO
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Info Role Sistem</h6>
        <table class="table table-borderless mb-0" style="font-size:13px;">
          <tr>
            <td style="padding:8px 0;"><span class="badge" style="background:#e8f0ff;color:#1969ff;border-radius:6px;">Admin</span></td>
            <td style="padding:8px 0;color:#6b7280;">Hero Banner, Dashboard, Jenis Motor, Data Motor, Manajemen User</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><span class="badge" style="background:#d1fae5;color:#059669;border-radius:6px;">Marketing</span></td>
            <td style="padding:8px 0;color:#6b7280;">Pengajuan Kredit, Angsuran & Kwitansi, Pengiriman, Asuransi</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><span class="badge" style="background:#fef3c7;color:#b45309;border-radius:6px;">CEO</span></td>
            <td style="padding:8px 0;color:#6b7280;">Dashboard Laporan, Penjualan, Kredit Macet, Data Pelanggan</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><span class="badge" style="background:#fce7f3;color:#db2777;border-radius:6px;">Client</span></td>
            <td style="padding:8px 0;color:#6b7280;">Katalog, Pengajuan, Angsuran & Bukti Bayar, Tracking Motor</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
