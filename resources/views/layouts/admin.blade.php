<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Panel') — Kredio</title>

    {{-- StarAdmin Vendor CSS --}}
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/assets/vendors/css/vendor.bundle.base.css') }}">

    {{-- StarAdmin Core CSS --}}
    <link rel="stylesheet" href="{{ asset('staradmin/assets/css/style.css') }}">

    {{-- Bootstrap Icons (tetap dipakai untuk ikon tambahan) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
      /* ── Override: Branding Kredio ─────────────────────────────── */
      .navbar-brand-wrapper {
        background: #fff;
        border-right: 1px solid #e8e8e8;
      }

      .sidebar {
        background: #fff;
      }

      .nav .nav-item .nav-link.active {
        background: rgba(25, 105, 255, 0.08);
        color: #1969ff;
      }

      .nav .nav-item .nav-link.active .menu-icon,
      .nav .nav-item .nav-link.active .menu-title {
        color: #1969ff;
      }

      /* ── Stat Cards Custom ─────────────────────────────────────── */
      .kredio-stat-card {
        border-radius: 12px;
        border: 1px solid #e8ecf1;
        background: #fff;
        padding: 24px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: box-shadow 0.2s;
      }

      .kredio-stat-card:hover {
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      }

      .kredio-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
      }

      .kredio-stat-num {
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
        color: #1a1a2e;
      }

      .kredio-stat-label {
        font-size: 13px;
        color: #8a92a6;
        margin-top: 4px;
        font-weight: 500;
      }

      /* ── Welcome text custom ───────────────────────────────────── */
      .welcome-text {
        font-size: 20px !important;
      }

      /* ── Flash alert positioning ───────────────────────────────── */
      .flash-area {
        margin-bottom: 20px;
      }
    </style>

    @stack('styles')
  </head>

  <body class="with-welcome-text">
    <div class="container-scroller">

      {{-- ── NAVBAR / TOPBAR ──────────────────────────────────────── --}}
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">

        {{-- Brand / Logo --}}
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
              <span style="font-size:22px;font-weight:800;color:#1969ff;letter-spacing:-0.5px;">
                Kredio
              </span>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
              <span style="font-size:16px;font-weight:800;color:#1969ff;">K</span>
            </a>
          </div>
        </div>

        {{-- Nav Menu Wrapper --}}
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">
                Selamat Datang, <span class="text-black fw-bold">{{ auth()->user()->name ?? 'Admin' }}</span>
              </h1>
              <h3 class="welcome-sub-text">Ringkasan panel admin Kredio</h3>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            {{-- Notification --}}
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="icon-bell"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 fw-medium float-start">Notifikasi</p>
                  <span class="badge badge-pill badge-danger float-end pt-0">0</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Belum ada notifikasi</h6>
                  </div>
                </a>
              </div>
            </li>

            {{-- User Dropdown --}}
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;overflow:hidden;">
                  {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center" style="padding:16px 20px;">
                  <div style="width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:22px;margin:0 auto 10px;overflow:hidden;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                  </div>
                  <p class="mb-1 mt-1 fw-semibold" style="font-size:14px;">{{ auth()->user()->name ?? 'Administrator' }}</p>
                  <p class="fw-light text-muted mb-0" style="font-size:12px;">{{ auth()->user()->email ?? '' }}</p>
                </div>
                <div style="border-top:1px solid #f3f4f6;margin:4px 0;"></div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profil Saya
                </a>
                <a class="dropdown-item text-danger"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                  <i class="dropdown-item-icon mdi mdi-power text-danger me-2"></i>Logout
                </a>
              </div>
            </li>
          </ul>

          {{-- Mobile toggle --}}
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      {{-- /NAVBAR --}}

      <div class="container-fluid page-body-wrapper">

        {{-- ── SIDEBAR ──────────────────────────────────────────── --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            {{-- UTAMA --}}
            <li class="nav-item nav-category">UTAMA</li>

            <li class="nav-item {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}"
                 href="{{ route('admin.hero.index') }}">
                <i class="menu-icon mdi mdi-image-edit-outline"></i>
                <span class="menu-title">Hero Banner</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                 href="{{ route('admin.dashboard') }}">
                <i class="menu-icon mdi mdi-view-dashboard-outline"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            {{-- DATA MOTOR --}}
            <li class="nav-item nav-category">DATA MOTOR</li>

            <li class="nav-item {{ request()->routeIs('admin.jenis-motor.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('admin.jenis-motor.*') ? 'active' : '' }}"
                 href="{{ route('admin.jenis-motor.index') }}">
                <i class="menu-icon mdi mdi-tag-outline"></i>
                <span class="menu-title">Jenis Motor</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.motor.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('admin.motor.*') ? 'active' : '' }}"
                 href="{{ route('admin.motor.index') }}">
                <i class="menu-icon mdi mdi-motorbike"></i>
                <span class="menu-title">Data Motor</span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.jenis-cicilan.*') ? 'active' : '' }}">
              <a class="nav-link {{ request()->routeIs('admin.jenis-cicilan.*') ? 'active' : '' }}"
                 href="{{ route('admin.jenis-cicilan.index') }}">
                <i class="menu-icon mdi mdi-calendar-clock"></i>
                <span class="menu-title">Jenis Cicilan</span>
              </a>
            </li>


          </ul>
        </nav>
        {{-- /SIDEBAR --}}

        {{-- ── MAIN PANEL ───────────────────────────────────────── --}}
        <div class="main-panel">
          <div class="content-wrapper">

            {{-- Flash Messages --}}
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

          {{-- Footer --}}
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                Copyright &copy; {{ date('Y') }} <strong>Kredio</strong>. All rights reserved.
              </span>
            </div>
          </footer>
        </div>
        {{-- /MAIN PANEL --}}

      </div>
    </div>

    {{-- Logout Form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

    {{-- StarAdmin Vendor JS --}}
    <script src="{{ asset('staradmin/assets/vendors/js/vendor.bundle.base.js') }}"></script>

    {{-- StarAdmin Core JS --}}
    <script src="{{ asset('staradmin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/template.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('staradmin/assets/js/todolist.js') }}"></script>

    @stack('scripts')
  </body>
</html>