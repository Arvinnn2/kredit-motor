<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'CEO Panel') — Kredio</title>

    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
      /* ── Warna biru seragam dengan admin ── */
      .navbar-brand-wrapper { background:#fff; border-right:1px solid #e8e8e8; }
      .sidebar { background:#fff; }

      .nav .nav-item .nav-link.active {
        background: rgba(25,105,255,0.08);
        color: #1969ff;
      }
      .nav .nav-item .nav-link.active .menu-icon,
      .nav .nav-item .nav-link.active .menu-title { color: #1969ff; }

      .role-badge {
        background: #eff4ff;
        color: #1148cc;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
      }

      .kredio-stat-card {
        border-radius: 12px;
        border: 1px solid #e8ecf1;
        background: #fff;
        padding: 24px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: box-shadow .2s;
      }
      .kredio-stat-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
      .kredio-stat-icon {
        width: 52px; height: 52px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; flex-shrink: 0;
      }
      .kredio-stat-num { font-size: 26px; font-weight: 700; line-height: 1; color: #1a1a2e; }
      .kredio-stat-label { font-size: 13px; color: #8a92a6; margin-top: 4px; font-weight: 500; }
      .flash-area { margin-bottom: 20px; }
      .welcome-text { font-size: 20px !important; }
    </style>
    @stack('styles')
  </head>

  <body class="with-welcome-text">
    <div class="container-scroller">

      {{-- NAVBAR --}}
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="{{ route('ceo.dashboard') }}">
              <span style="font-size:22px;font-weight:800;color:#1969ff;letter-spacing:-0.5px;">Kredio</span>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('ceo.dashboard') }}">
              <span style="font-size:16px;font-weight:800;color:#1969ff;">K</span>
            </a>
          </div>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">
                CEO Panel — <span class="text-black fw-bold">{{ auth()->user()->name }}</span>
              </h1>
              <h3 class="welcome-sub-text"><span class="role-badge">CEO / Owner</span></h3>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            {{-- User Dropdown --}}
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;">
                  {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 2)) }}
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center" style="padding:16px 20px;">
                  <div style="width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:22px;margin:0 auto 10px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 2)) }}
                  </div>
                  <p class="mb-1 mt-1 fw-semibold" style="font-size:14px;">{{ auth()->user()->name }}</p>
                  <p class="fw-light text-muted mb-0" style="font-size:12px;">{{ auth()->user()->email }}</p>
                </div>
                <div style="border-top:1px solid #f3f4f6;margin:4px 0;"></div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profil Saya
                </a>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                  <i class="dropdown-item-icon mdi mdi-power text-danger me-2"></i>Logout
                </a>
              </div>
            </li>
          </ul>

          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

      <div class="container-fluid page-body-wrapper">

        {{-- SIDEBAR --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            <li class="nav-item nav-category">RINGKASAN</li>

            <li class="nav-item {{ request()->routeIs('ceo.dashboard') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('ceo.dashboard') ? 'active' : '' }}" href="{{ route('ceo.dashboard') }}">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Dashboard CEO</span>
              </a>
            </li>

            <li class="nav-item nav-category">LAPORAN</li>

            <li class="nav-item {{ request()->routeIs('ceo.laporan.penjualan') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('ceo.laporan.penjualan') ? 'active' : '' }}" href="{{ route('ceo.laporan.penjualan') }}">
                <i class="menu-icon mdi mdi-file-chart-outline"></i>
                <span class="menu-title">Laporan Penjualan</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('ceo.laporan.kredit-macet') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('ceo.laporan.kredit-macet') ? 'active' : '' }}" href="{{ route('ceo.laporan.kredit-macet') }}">
                <i class="menu-icon mdi mdi-alert-circle-outline"></i>
                <span class="menu-title">Kredit Macet</span>
              </a>
            </li>

            <li class="nav-item nav-category">DATA</li>

            <li class="nav-item {{ request()->routeIs('ceo.pelanggan.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('ceo.pelanggan.*') ? 'active' : '' }}" href="{{ route('ceo.pelanggan.index') }}">
                <i class="menu-icon mdi mdi-account-group-outline"></i>
                <span class="menu-title">Data Pelanggan</span>
              </a>
            </li>

            <li class="nav-item nav-category">SISTEM</li>

            <li class="nav-item {{ request()->routeIs('ceo.users.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('ceo.users.*') ? 'active' : '' }}" href="{{ route('ceo.users.index') }}">
                <i class="menu-icon mdi mdi-account-cog-outline"></i>
                <span class="menu-title">Manajemen User</span>
              </a>
            </li>

          </ul>
        </nav>

        {{-- MAIN PANEL --}}
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="flash-area">
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="mdi mdi-check-circle me-2"></i>{{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="mdi mdi-alert-circle me-2"></i>{{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif
            </div>

            @yield('content')
          </div>

          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                Copyright &copy; {{ date('Y') }} <strong>Kredio</strong>. All rights reserved.
              </span>
            </div>
          </footer>
        </div>

      </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

    <script src="{{ asset('staradmin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/template.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/settings.js') }}"></script>
    @stack('scripts')
  </body>
</html>
