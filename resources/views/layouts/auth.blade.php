<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Login') — Kredit Motor</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root { --accent: #1a56db; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      background: #f9fafb;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .auth-container {
      display: flex;
      width: 100%;
      max-width: 900px;
      min-height: 560px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 32px rgba(0,0,0,.07);
    }

    /* Left panel (brand) */
    .auth-left {
      width: 380px;
      background: var(--accent);
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 40px;
      color: #fff;
    }

    .brand-logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .brand-logo .icon {
      width: 36px; height: 36px;
      background: rgba(255,255,255,.2);
      border-radius: 9px;
      display: flex; align-items: center; justify-content: center;
      font-size: 16px;
      font-weight: 700;
    }

    .brand-logo span {
      font-size: 16px;
      font-weight: 600;
      line-height: 1.2;
    }

    .brand-logo small {
      font-size: 11px;
      opacity: .7;
      display: block;
      font-weight: 400;
    }

    .brand-headline {
      font-size: 24px;
      font-weight: 600;
      line-height: 1.35;
      margin-bottom: 12px;
    }

    .brand-sub { font-size: 13px; opacity: .75; line-height: 1.6; }

    .brand-features { margin-top: 24px; display: flex; flex-direction: column; gap: 10px; }
    .brand-feature {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      opacity: .85;
    }

    .feature-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: rgba(255,255,255,.6);
      flex-shrink: 0;
    }

    /* Right panel (form) */
    .auth-right {
      flex: 1;
      background: #fff;
      padding: 48px 44px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .auth-title {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 4px;
    }

    .auth-sub {
      font-size: 13px;
      color: #6b7280;
      margin-bottom: 28px;
    }

    .form-control {
      font-family: inherit;
      font-size: 13.5px;
      border-radius: 7px;
      border: 1px solid #e5e7eb;
      padding: 9px 12px;
    }

    .form-control:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(26,86,219,.1);
    }

    .form-label { font-size: 13px; font-weight: 500; margin-bottom: 6px; }

    .btn-primary {
      background: var(--accent);
      border-color: var(--accent);
      font-family: inherit;
      font-size: 13.5px;
      font-weight: 500;
      padding: 10px;
      border-radius: 7px;
    }

    .btn-primary:hover { background: #1648c4; border-color: #1648c4; }

    .input-group-text {
      border: 1px solid #e5e7eb;
      background: #f9fafb;
      border-radius: 7px 0 0 7px;
      color: #9ca3af;
      font-size: 15px;
    }

    .input-group .form-control { border-radius: 0 7px 7px 0; border-left: none; }
    .input-group .form-control:focus { border-color: var(--accent); }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 20px 0;
      color: #9ca3af;
      font-size: 12px;
    }

    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e5e7eb;
    }

    .auth-link {
      font-size: 13px;
      text-align: center;
      color: #6b7280;
      margin-top: 18px;
    }

    .auth-link a {
      color: var(--accent);
      font-weight: 500;
      text-decoration: none;
    }

    .auth-link a:hover { text-decoration: underline; }

    @media(max-width:700px) {
      .auth-left { display: none; }
      .auth-container { max-width: 420px; }
      .auth-right { padding: 36px 28px; }
    }
  </style>
</head>
<body>

<div class="auth-container">
  <!-- Left Panel -->
  <div class="auth-left">
    <div class="brand-logo">
      <div class="icon">KM</div>
      <span>Kredit Motor<small>Online System</small></span>
    </div>

    <div>
      <div class="brand-headline">Kredit Motor<br>Mudah & Cepat</div>
      <div class="brand-sub">Ajukan kredit kendaraan bermotor secara online, proses transparan dan terpercaya.</div>
      <div class="brand-features">
        <div class="brand-feature"><div class="feature-dot"></div> Proses pengajuan 100% online</div>
        <div class="brand-feature"><div class="feature-dot"></div> Pantau status pengajuan real-time</div>
        <div class="brand-feature"><div class="feature-dot"></div> Berbagai pilihan cicilan fleksibel</div>
        <div class="brand-feature"><div class="feature-dot"></div> Asuransi kendaraan terpercaya</div>
      </div>
    </div>

    <div style="font-size:12px;opacity:.5">© {{ date('Y') }} Kredit Motor. All rights reserved.</div>
  </div>

  <!-- Right Panel -->
  <div class="auth-right">
    @yield('auth-content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

{{--
====================================================
CONTOH PENGGUNAAN — resources/views/auth/login.blade.php
====================================================

@extends('layouts.auth')
@section('title', 'Login')

@section('auth-content')
  <div class="auth-title">Selamat datang kembali</div>
  <div class="auth-sub">Masuk ke akun Anda untuk melanjutkan</div>

  @if($errors->any())
    <div class="alert alert-danger py-2 mb-3" style="font-size:13px;border-radius:7px">
      <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Email</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="email" name="email" class="form-control" placeholder="email@domain.com"
               value="{{ old('email') }}" required autofocus>
      </div>
    </div>

    <div class="mb-3">
      <div class="d-flex justify-content-between align-items-center mb-1">
        <label class="form-label mb-0">Password</label>
        <a href="{{ route('password.request') }}" style="font-size:12px;color:#1a56db">Lupa password?</a>
      </div>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
      </div>
    </div>

    <div class="form-check mb-4">
      <input class="form-check-input" type="checkbox" name="remember" id="remember">
      <label class="form-check-label" for="remember" style="font-size:13px">Ingat saya</label>
    </div>

    <button type="submit" class="btn btn-primary w-100">
      <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
    </button>
  </form>

  <div class="auth-link">
    Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
  </div>
@endsection
--}}
