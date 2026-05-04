<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Marketing Panel') — Kredio</title>

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
            <a class="navbar-brand brand-logo" href="{{ route('marketing.dashboard') }}">
              <span style="font-size:22px;font-weight:800;color:#1969ff;letter-spacing:-0.5px;">Kredio</span>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('marketing.dashboard') }}">
              <span style="font-size:16px;font-weight:800;color:#1969ff;">K</span>
            </a>
          </div>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">
                Marketing Panel — <span class="text-black fw-bold">{{ auth()->user()->name }}</span>
              </h1>
              <h3 class="welcome-sub-text"><span class="role-badge">Marketing</span></h3>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            {{-- User Dropdown --}}
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;">
                  {{ strtoupper(substr(auth()->user()->name ?? 'M', 0, 2)) }}
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center" style="padding:16px 20px;">
                  <div style="width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:22px;margin:0 auto 10px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'M', 0, 2)) }}
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

            <li class="nav-item nav-category">UTAMA</li>

            <li class="nav-item {{ request()->routeIs('marketing.dashboard') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('marketing.dashboard') ? 'active' : '' }}" href="{{ route('marketing.dashboard') }}">
                <i class="menu-icon mdi mdi-view-dashboard-outline"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('marketing.pengajuan.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('marketing.pengajuan.*') ? 'active' : '' }}" href="{{ route('marketing.pengajuan.index') }}">
                <i class="menu-icon mdi mdi-file-document-outline"></i>
                <span class="menu-title">Pengajuan Kredit</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('marketing.angsuran.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('marketing.angsuran.*') ? 'active' : '' }}" href="{{ route('marketing.angsuran.index') }}">
                <i class="menu-icon mdi mdi-cash-multiple"></i>
                <span class="menu-title">Angsuran & Kwitansi</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('marketing.pengiriman.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('marketing.pengiriman.*') ? 'active' : '' }}" href="{{ route('marketing.pengiriman.index') }}">
                <i class="menu-icon mdi mdi-truck-outline"></i>
                <span class="menu-title">Pengiriman</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('marketing.asuransi.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('marketing.asuransi.*') ? 'active' : '' }}" href="{{ route('marketing.asuransi.index') }}">
                <i class="menu-icon mdi mdi-shield-check-outline"></i>
                <span class="menu-title">Asuransi</span>
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
