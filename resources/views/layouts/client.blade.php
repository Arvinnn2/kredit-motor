<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard') — Kredio</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --blue: #1969ff;
      --blue-dark: #1148cc;
      --blue-light: #eff4ff;
      --orange: #ff6b35;
      --border: #e5e7eb;
      --surface: #f4f6fb;
      --text-muted: #6b7280;
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      background: var(--surface);
      color: #111827;
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ── NAVBAR ─────────────────────────────────────────── */
    .site-navbar {
      background: #fff;
      border-bottom: 1px solid var(--border);
      height: 60px;
      display: flex;
      align-items: center;
      padding: 0 32px;
      position: sticky;
      top: 0;
      z-index: 100;
      gap: 0;
    }

    .nav-brand {
      font-size: 20px;
      font-weight: 800;
      color: var(--blue);
      text-decoration: none;
      letter-spacing: -0.5px;
      margin-right: 32px;
      flex-shrink: 0;
    }

    .nav-brand span { color: var(--blue); }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 2px;
      list-style: none;
      margin: 0;
      padding: 0;
      flex: 1;
    }

    .nav-links a {
      font-size: 13.5px;
      font-weight: 500;
      color: #4b5563;
      text-decoration: none;
      padding: 7px 14px;
      border-radius: 8px;
      height: 60px;
      display: flex;
      align-items: center;
      border-bottom: 2.5px solid transparent;
      border-radius: 0;
      transition: color .15s, border-color .15s, background .15s;
    }

    .nav-links a:hover { color: var(--blue); background: var(--blue-light); }

    .nav-links a.active {
      color: var(--blue);
      border-bottom-color: var(--blue);
      font-weight: 600;
    }

    /* ── USER DROPDOWN ──────────────────────────────────── */
    .user-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      background: none;
      border: 1px solid var(--border);
      border-radius: 100px;
      padding: 5px 14px 5px 6px;
      cursor: pointer;
      font-family: inherit;
      font-size: 13.5px;
      font-weight: 600;
      color: #111827;
      transition: border-color .15s, background .15s;
    }

    .user-btn:hover { border-color: var(--blue); background: var(--blue-light); }

    .user-avatar {
      width: 30px; height: 30px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--blue), #6ea8fe);
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 12px;
      flex-shrink: 0;
    }

    .dropdown-menu {
      border: 1px solid var(--border) !important;
      border-radius: 12px !important;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1) !important;
      padding: 6px !important;
      min-width: 180px;
    }

    .dropdown-item {
      border-radius: 8px !important;
      font-size: 13.5px !important;
      font-weight: 500 !important;
      padding: 9px 14px !important;
      color: #374151 !important;
    }

    .dropdown-item:hover { background: var(--blue-light) !important; color: var(--blue) !important; }
    .dropdown-item.text-danger:hover { background: #fee2e2 !important; color: #dc2626 !important; }

    /* ── MAIN CONTENT ─────────────────────────────────── */
    .main-content {
      flex: 1;
      padding: 28px 32px;
      width: 100%;
    }

    /* ── CARDS ─────────────────────────────────────────── */
    .card {
      border: 1px solid var(--border) !important;
      border-radius: 12px !important;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04) !important;
      background: #fff !important;
    }

    .card-header {
      background: transparent !important;
      border-bottom: 1px solid var(--border) !important;
      padding: 14px 20px !important;
      font-size: 14px !important;
      font-weight: 600 !important;
      border-radius: 12px 12px 0 0 !important;
    }

    .card-body { padding: 20px !important; }

    /* ── STAT CARDS ─────────────────────────────────────── */
    .kredio-stat-card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
      transition: box-shadow .2s, transform .2s;
    }

    .kredio-stat-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,0.08); transform: translateY(-1px); }

    .kredio-stat-icon {
      width: 48px; height: 48px;
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }

    .kredio-stat-num { font-size: 24px; font-weight: 700; line-height: 1; color: #0d0f1a; }
    .kredio-stat-label { font-size: 12px; color: var(--text-muted); margin-top: 4px; font-weight: 500; }

    /* ── TABLE ─────────────────────────────────────────── */
    .table { font-size: 13.5px; margin-bottom: 0; }

    .table th {
      font-size: 12px;
      font-weight: 600;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: .04em;
      border-bottom: 1px solid var(--border) !important;
      padding: 11px 16px;
      background: var(--surface);
    }

    .table td {
      padding: 12px 16px;
      border-bottom: 1px solid #f3f4f6 !important;
      vertical-align: middle;
    }

    .table tbody tr:last-child td { border-bottom: none !important; }
    .table tbody tr:hover td { background: #fafbff; }

    /* ── FORM ───────────────────────────────────────────── */
    .form-control, .form-select {
      font-size: 13.5px;
      border-radius: 8px;
      border: 1px solid var(--border);
      padding: 9px 13px;
      font-family: inherit;
    }

    .form-control:focus, .form-select:focus {
      border-color: var(--blue);
      box-shadow: 0 0 0 3px rgba(25,105,255,.1);
    }

    .form-label { font-size: 13px; font-weight: 600; margin-bottom: 6px; }

    /* ── BUTTON ─────────────────────────────────────────── */
    .btn {
      font-size: 13.5px;
      padding: 8px 18px;
      border-radius: 8px;
      font-weight: 600;
      font-family: inherit;
    }

    .btn-primary { background: var(--blue) !important; border-color: var(--blue) !important; }
    .btn-primary:hover { background: var(--blue-dark) !important; border-color: var(--blue-dark) !important; }
    .btn-sm { padding: 5px 12px !important; font-size: 12.5px !important; }

    /* ── BADGE ──────────────────────────────────────────── */
    .badge { font-size: 11px; font-weight: 600; padding: 4px 9px; border-radius: 6px; }

    /* ── ALERT ──────────────────────────────────────────── */
    .alert { font-size: 13.5px; border-radius: 10px; }

    /* ── PAGE TITLE ─────────────────────────────────────── */
    .page-title { font-size: 20px; font-weight: 700; color: #0d0f1a; margin-bottom: 4px; }
    .page-sub { font-size: 13px; color: var(--text-muted); }

    /* ── STATUS STEPS ───────────────────────────────────── */
    .status-steps {
      display: flex;
      align-items: center;
      gap: 0;
    }

    .status-step {
      flex: 1;
      text-align: center;
      position: relative;
    }

    .step-dot {
      width: 30px; height: 30px;
      border-radius: 50%;
      border: 2px solid var(--border);
      background: #fff;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px;
      margin: 0 auto 6px;
      position: relative; z-index: 1;
    }

    .step-dot.done { background: var(--blue); border-color: var(--blue); color: #fff; }
    .step-dot.active { border-color: var(--blue); color: var(--blue); }
    .step-label { font-size: 11px; color: var(--text-muted); }
    .step-label.active { color: var(--blue); font-weight: 600; }

    .status-step:not(:last-child)::after {
      content: '';
      position: absolute;
      top: 15px; left: 50%; right: -50%;
      height: 1px;
      background: var(--border);
      z-index: 0;
    }

    /* ── INFO LIST ──────────────────────────────────────── */
    .info-list dt { font-size: 12px; color: var(--text-muted); margin-bottom: 2px; font-weight: 500; }
    .info-list dd { font-size: 13.5px; font-weight: 600; margin-bottom: 14px; }

    /* ── FOOTER ─────────────────────────────────────────── */
    .site-footer {
      background: #fff;
      border-top: 1px solid var(--border);
      padding: 16px 32px;
      font-size: 12.5px;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
    }

    .site-footer a { color: var(--text-muted); text-decoration: none; }
    .site-footer a:hover { color: var(--blue); }
  </style>

  @stack('styles')
</head>
<body>

{{-- ── NAVBAR ─────────────────────────────────────────── --}}
<nav class="site-navbar">
  <a href="{{ route('home') }}" class="nav-brand">Kred<span>io</span></a>

  <ul class="nav-links">
    <li>
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('client.dashboard') }}" class="{{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
        Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('client.motor.index') }}" class="{{ request()->routeIs('client.motor*') ? 'active' : '' }}">
        Katalog Motor
      </a>
    </li>
    <li>
      <a href="{{ route('client.pengajuan.index') }}" class="{{ request()->routeIs('client.pengajuan*') ? 'active' : '' }}">
        Pengajuan Saya
      </a>
    </li>
    <li>
      <a href="{{ route('client.angsuran.index') }}" class="{{ request()->routeIs('client.angsuran*') ? 'active' : '' }}">
        Angsuran
      </a>
    </li>
  </ul>

  {{-- User Dropdown --}}
  @php $pelangganNav = auth()->user()->pelanggan; @endphp
  <div class="dropdown">
    <button class="user-btn" data-bs-toggle="dropdown" aria-expanded="false">
      @if($pelangganNav && $pelangganNav->foto)
        <img src="{{ asset('storage/'.$pelangganNav->foto) }}"
          style="width:30px;height:30px;border-radius:50%;object-fit:cover;flex-shrink:0;">
      @else
        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
      @endif
      {{ auth()->user()->name }}
      <i class="bi bi-chevron-down" style="font-size:11px;color:#9ca3af"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" style="min-width:200px;padding:6px;">
      {{-- Header profil --}}
      <li>
        <div class="text-center" style="padding:14px 16px;">
          @if($pelangganNav && $pelangganNav->foto)
            <img src="{{ asset('storage/'.$pelangganNav->foto) }}"
              style="width:56px;height:56px;border-radius:50%;object-fit:cover;border:2px solid #e5e7eb;margin-bottom:8px;">
          @else
            <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px;margin:0 auto 8px;">
              {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
          @endif
          <div style="font-weight:600;font-size:13.5px;color:#111827;">{{ auth()->user()->name }}</div>
          <div style="font-size:11.5px;color:#6b7280;">{{ auth()->user()->email }}</div>
        </div>
      </li>
      <li><hr class="dropdown-divider my-1"></li>
      <li>
        <a class="dropdown-item" href="{{ route('client.profile') }}"
           style="border-radius:8px;font-size:13.5px;font-weight:500;padding:9px 14px;">
          <i class="bi bi-person me-2"></i>Profil Saya
        </a>
      </li>
      <li>
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
           style="border-radius:8px;font-size:13.5px;font-weight:500;padding:9px 14px;"
           onclick="event.preventDefault(); document.getElementById('logout-form-client').submit()">
          <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
      </li>
    </ul>
  </div>
</nav>

<form id="logout-form-client" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

{{-- ── MAIN ─────────────────────────────────────────────── --}}
<main class="main-content">

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
      <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4">
      <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @yield('content')
</main>

{{-- ── FOOTER ───────────────────────────────────────────── --}}
<footer class="site-footer">
  <div>&copy; {{ date('Y') }} <strong>Kredio</strong>. Hak Cipta Dilindungi.</div>
  <div style="display:flex;gap:20px;">
    <a href="{{ route('home') }}">Beranda</a>
    <a href="{{ route('client.profile') }}">Profil Saya</a>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>