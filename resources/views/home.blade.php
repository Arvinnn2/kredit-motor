<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kredio — Kredit Motor Online Terpercaya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --blue:#1969ff;--blue-dark:#1148cc;--blue-light:#eff4ff;
      --border:#e5e7eb;--surface:#f8fafc;--gray:#6b7280;
    }
    *{box-sizing:border-box;margin:0;padding:0;}
    body{font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;color:#111827;background:#fff;}

    /* ── NAVBAR ─────────────────────────────────── */
    .site-navbar{
      position:fixed;top:0;left:0;right:0;z-index:1000;
      background:rgba(255,255,255,0.97);backdrop-filter:blur(12px);
      border-bottom:1px solid var(--border);
      height:64px;display:flex;align-items:center;
      padding:0 48px;gap:32px;
    }
    .nav-brand{font-size:22px;font-weight:800;color:var(--blue);letter-spacing:-.5px;text-decoration:none;flex-shrink:0;line-height:1;}
    .nav-links{display:flex;align-items:center;gap:2px;list-style:none;flex:1;margin:0;padding:0;}
    .nav-links a{font-size:14px;font-weight:500;color:#374151;text-decoration:none;padding:7px 14px;border-radius:8px;transition:background .15s,color .15s;line-height:1;}
    .nav-links a:hover,.nav-links a.active{background:var(--blue-light);color:var(--blue);}
    .nav-actions{display:flex;align-items:center;gap:10px;flex-shrink:0;}
    .btn-login{font-size:14px;font-weight:600;color:var(--blue);text-decoration:none;padding:8px 20px;border-radius:10px;border:1.5px solid var(--blue);transition:background .15s,color .15s;line-height:1;}
    .btn-login:hover{background:var(--blue);color:#fff;}
    .btn-daftar{font-size:14px;font-weight:600;color:#fff;text-decoration:none;padding:8px 20px;border-radius:10px;background:var(--blue);line-height:1;}
    .btn-daftar:hover{background:var(--blue-dark);}
    .user-btn{display:flex;align-items:center;gap:10px;background:none;border:1px solid var(--border);border-radius:100px;padding:5px 14px 5px 6px;cursor:pointer;font-family:inherit;font-size:13.5px;font-weight:600;color:#111827;transition:border-color .15s,background .15s;line-height:1;}
    .user-btn:hover{border-color:var(--blue);background:var(--blue-light);}
    .user-avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--blue),#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;flex-shrink:0;}
    .dropdown-menu{border:1px solid var(--border)!important;border-radius:12px!important;box-shadow:0 8px 24px rgba(0,0,0,.1)!important;padding:6px!important;min-width:180px;}
    .dropdown-item{border-radius:8px!important;font-size:13.5px!important;font-weight:500!important;padding:9px 14px!important;color:#374151!important;}
    .dropdown-item:hover{background:var(--blue-light)!important;color:var(--blue)!important;}
    .dropdown-item.text-danger:hover{background:#fee2e2!important;color:#dc2626!important;}

    /* ── HERO ────────────────────────────────────── */
    .hero{
      margin-top:64px;
      position:relative;
      width:100%;
      height:90vh;
      min-height:500px;
      overflow:hidden;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .hero-bg-img{
      position:absolute;inset:0;
      width:100%;height:100%;
      object-fit:cover;object-position:center;
    }
    .hero-bg-placeholder{
      position:absolute;inset:0;
      background:linear-gradient(135deg,#0d1a3a 0%,#1a2d5a 50%,#0d2040 100%);
    }
    .hero-overlay{
      position:absolute;inset:0;
      background:rgba(0,0,0,0.45);
    }
    /* Konten teks di tengah */
    .hero-content{
      position:relative;
      z-index:2;
      text-align:center;
      padding:0 24px;
      max-width:780px;
    }
    .hero-content h1{
      font-size:clamp(32px,5vw,62px);
      font-weight:800;
      color:#fff;
      line-height:1.12;
      letter-spacing:-1.5px;
      margin-bottom:20px;
      text-shadow:0 2px 20px rgba(0,0,0,0.25);
    }
    .hero-content h1 .highlight{color:#60a5fa;}
    .hero-content p{
      font-size:clamp(15px,1.8vw,18px);
      color:rgba(255,255,255,0.85);
      line-height:1.75;
      max-width:580px;
      margin:0 auto;
    }

    /* ── FEATURES STRIP ──────────────────────────── */
    .features-strip{background:var(--surface);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:24px 48px;display:flex;gap:0;}
    .feature-item{display:flex;align-items:center;gap:14px;flex:1;padding:0 32px;border-right:1px solid var(--border);}
    .feature-item:first-child{padding-left:0;}
    .feature-item:last-child{border-right:none;}
    .feature-icon{width:40px;height:40px;border-radius:10px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
    .feature-title{font-size:13px;font-weight:700;color:#0d0f1a;}
    .feature-desc{font-size:12px;color:var(--gray);margin-top:2px;}

    /* ── SECTIONS ────────────────────────────────── */
    .section{padding:80px 48px;}
    .section-bg{background:var(--surface);}
    .section-label{font-size:12px;font-weight:700;color:var(--blue);letter-spacing:.08em;text-transform:uppercase;margin-bottom:10px;}
    .section-title{font-size:clamp(24px,3vw,36px);font-weight:800;color:#0d0f1a;letter-spacing:-.5px;line-height:1.2;}
    .section-sub{font-size:15px;color:var(--gray);margin-top:8px;max-width:500px;}

    /* ── KATEGORI ────────────────────────────────── */
    .kategori-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px;margin-top:32px;}
    .kategori-card{position:relative;border-radius:16px;overflow:hidden;cursor:pointer;text-decoration:none;display:block;aspect-ratio:4/3;background:#c8d4e8;transition:transform .2s,box-shadow .2s;}
    .kategori-card:hover{transform:scale(1.02);box-shadow:0 12px 36px rgba(0,0,0,.12);}
    .kategori-card img{width:100%;height:100%;object-fit:cover;}
    .kategori-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:56px;}
    .kategori-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.65) 0%,transparent 55%);}
    .kategori-body{position:absolute;bottom:0;left:0;right:0;padding:16px 18px;display:flex;align-items:flex-end;justify-content:space-between;}
    .kategori-name{font-size:15px;font-weight:700;color:#fff;}
    .kategori-arrow{width:30px;height:30px;background:rgba(255,255,255,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:13px;backdrop-filter:blur(6px);}

    /* ── MOTOR UNGGULAN ──────────────────────────── */
    .motor-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:20px;margin-top:32px;}
    .motor-card{background:#fff;border:1px solid var(--border);border-radius:16px;overflow:hidden;transition:box-shadow .2s,transform .2s;}
    .motor-card:hover{box-shadow:0 12px 36px rgba(0,0,0,.09);transform:translateY(-3px);}
    .motor-card-img{height:180px;background:var(--surface);display:flex;align-items:center;justify-content:center;overflow:hidden;}
    .motor-card-img img{width:100%;height:100%;object-fit:cover;}
    .motor-card-img .motor-emoji{font-size:72px;}
    .motor-card-body{padding:16px;}
    .motor-merk{font-size:11px;font-weight:700;color:var(--blue);text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px;}
    .motor-name{font-size:15px;font-weight:700;color:#0d0f1a;margin-bottom:8px;}
    .motor-harga{font-size:18px;font-weight:800;color:var(--blue);margin-bottom:4px;}
    .motor-cicilan{font-size:12px;color:var(--gray);margin-bottom:14px;}
    .btn-lihat{display:flex;align-items:center;justify-content:space-between;width:100%;padding:9px 14px;border-radius:8px;border:1.5px solid var(--border);background:#fff;font-size:13px;font-weight:600;color:#374151;text-decoration:none;transition:border-color .15s,background .15s,color .15s;}
    .btn-lihat:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light);}

    /* ── CARA KERJA ──────────────────────────────── */
    .steps-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:24px;margin-top:44px;}
    .step-card{text-align:center;padding:28px 20px;}
    .step-num{width:52px;height:52px;border-radius:16px;background:var(--blue-light);color:var(--blue);font-size:20px;font-weight:800;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;}
    .step-title{font-size:15px;font-weight:700;color:#0d0f1a;margin-bottom:8px;}
    .step-desc{font-size:13.5px;color:var(--gray);line-height:1.65;}

    /* ── CTA ─────────────────────────────────────── */
    .cta-section{background:linear-gradient(135deg,var(--blue) 0%,var(--blue-dark) 100%);padding:72px 48px;text-align:center;}
    .cta-section h2{font-size:clamp(26px,4vw,42px);font-weight:800;color:#fff;letter-spacing:-.5px;margin-bottom:12px;}
    .cta-section p{font-size:16px;color:rgba(255,255,255,.7);margin-bottom:34px;}
    .btn-cta-white{display:inline-flex;align-items:center;gap:8px;background:#fff;color:var(--blue);font-size:15px;font-weight:700;padding:13px 30px;border-radius:12px;text-decoration:none;transition:transform .15s,box-shadow .15s;}
    .btn-cta-white:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(0,0,0,.2);color:var(--blue);}
    .btn-cta-outline{display:inline-flex;align-items:center;gap:8px;background:transparent;color:#fff;font-size:15px;font-weight:600;padding:13px 30px;border-radius:12px;text-decoration:none;border:2px solid rgba(255,255,255,.4);transition:background .15s;}
    .btn-cta-outline:hover{background:rgba(255,255,255,.1);color:#fff;}

    /* ── FOOTER ──────────────────────────────────── */
    .site-footer{background:#0d0f1a;padding:56px 48px 28px;color:rgba(255,255,255,.45);}
    .footer-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:32px;}
    .footer-brand{font-size:22px;font-weight:800;color:var(--blue);margin-bottom:10px;}
    .footer-desc{font-size:13.5px;line-height:1.7;max-width:260px;}
    .footer-title{font-size:12px;font-weight:700;color:rgba(255,255,255,.75);text-transform:uppercase;letter-spacing:.06em;margin-bottom:14px;}
    .footer-links{list-style:none;padding:0;}
    .footer-links li{margin-bottom:10px;}
    .footer-links a{font-size:13.5px;color:rgba(255,255,255,.4);text-decoration:none;transition:color .15s;}
    .footer-links a:hover{color:rgba(255,255,255,.85);}
    .footer-divider{border-top:1px solid rgba(255,255,255,.07);margin:40px 0 22px;}
    .footer-bottom{display:flex;justify-content:space-between;align-items:center;font-size:13px;}
    .footer-bottom a{color:rgba(255,255,255,.35);text-decoration:none;}
    .footer-bottom a:hover{color:rgba(255,255,255,.7);}

    @media(max-width:768px){
      .hero{height:70vh;}
      .hero-content h1{font-size:32px;}
      .features-strip{flex-wrap:wrap;padding:20px 24px;}
      .feature-item{min-width:45%;border-right:none;padding:10px 0;border-bottom:1px solid var(--border);}
      .feature-item:nth-child(2n){border-bottom:none;}
      .section{padding:56px 24px;}
      .site-navbar{padding:0 20px;}
      .footer-grid{grid-template-columns:1fr 1fr;}
      .footer-bottom{flex-direction:column;gap:10px;}
    }
  </style>
</head>
<body>

{{-- ══ NAVBAR ══════════════════════════════════════ --}}
<nav class="site-navbar">
  <a href="{{ route('home') }}" class="nav-brand">Kredio</a>

  <ul class="nav-links">
    @auth
      <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
      @if(!auth()->user()->hasRole('admin') && !auth()->user()->hasRole('marketing') && !auth()->user()->hasRole('ceo'))
        <li><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('client.motor.index') }}">Katalog Motor</a></li>
        <li><a href="{{ route('client.pengajuan.index') }}">Pengajuan Saya</a></li>
        <li><a href="{{ route('client.angsuran.index') }}">Angsuran</a></li>
      @elseif(auth()->user()->hasRole('admin'))
        <li><a href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
      @elseif(auth()->user()->hasRole('marketing'))
        <li><a href="{{ route('marketing.dashboard') }}">Marketing Panel</a></li>
      @elseif(auth()->user()->hasRole('ceo'))
        <li><a href="{{ route('ceo.dashboard') }}">CEO Panel</a></li>
      @endif
    @else
      <li><a href="#motor-unggulan">Motor</a></li>
      <li><a href="#cara-kerja">Cara Kredit</a></li>
      <li><a href="#kategori">Kategori</a></li>
      <li><a href="{{ route('login') }}">Pengajuan Saya</a></li>
      <li><a href="{{ route('login') }}">Angsuran</a></li>
    @endauth
  </ul>

  <div class="nav-actions">
    @auth
      @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('admin.dashboard') }}" class="btn-daftar">Admin Panel</a>
      @elseif(auth()->user()->hasRole('marketing'))
        <a href="{{ route('marketing.dashboard') }}" class="btn-daftar" style="background:#059669;">Marketing Panel</a>
      @elseif(auth()->user()->hasRole('ceo'))
        <a href="{{ route('ceo.dashboard') }}" class="btn-daftar" style="background:#b45309;">CEO Panel</a>
      @else
        <div class="dropdown">
          <button class="user-btn" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
            {{ auth()->user()->name }}
            <i class="bi bi-chevron-down" style="font-size:11px;color:#9ca3af;"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('client.profile') }}">Profil Saya</a></li>
            <li><hr class="dropdown-divider my-1"></li>
            <li>
              <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault();document.getElementById('logout-home').submit()">
                Logout
              </a>
            </li>
          </ul>
        </div>
      @endif
    @else
      <a href="{{ route('login') }}" class="btn-login">Masuk</a>
      <a href="{{ route('register') }}" class="btn-daftar">Daftar Sekarang</a>
    @endauth
  </div>
</nav>
<form id="logout-home" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

{{-- ══ HERO — FULL WIDTH BANNER ═══════════════════ --}}
<section class="hero">
  {{-- Background gambar dari HeroSetting (diatur admin) --}}
  @if($hero && $hero->gambar)
    <img class="hero-bg-img" src="{{ Storage::url($hero->gambar) }}" alt="Kredio Hero">
  @else
    @php
      $heroJpg  = public_path('images/hero.jpg');
      $heroPng  = public_path('images/hero.png');
      $heroWebp = public_path('images/hero.webp');
    @endphp
    @if(file_exists($heroJpg))
      <img class="hero-bg-img" src="{{ asset('images/hero.jpg') }}" alt="Kredio Hero">
    @elseif(file_exists($heroPng))
      <img class="hero-bg-img" src="{{ asset('images/hero.png') }}" alt="Kredio Hero">
    @elseif(file_exists($heroWebp))
      <img class="hero-bg-img" src="{{ asset('images/hero.webp') }}" alt="Kredio Hero">
    @else
      <div class="hero-bg-placeholder"></div>
    @endif
  @endif

  <div class="hero-overlay"></div>

  {{-- Teks di tengah --}}
  <div class="hero-content">
    <h1>
      {!! $hero && $hero->judul
        ? nl2br(e($hero->judul))
        : 'Motor Impianmu,<br><span class="highlight">Sekarang Bisa</span><br>Kamu Miliki' !!}
    </h1>
    <p>
      {{ $hero && $hero->deskripsi
        ? $hero->deskripsi
        : 'Kredio hadir untuk memudahkan proses kredit motor secara online. Pengajuan cepat, cicilan fleksibel, dan disetujui dalam hitungan jam.' }}
    </p>
  </div>
</section>

{{-- ══ FEATURES STRIP ════════════════════════════════ --}}
<div class="features-strip">
  <div class="feature-item">
    <div class="feature-icon"><i class="bi bi-lightning-charge"></i></div>
    <div><div class="feature-title">Pengajuan Instan</div><div class="feature-desc">Disetujui dalam 1 hari kerja</div></div>
  </div>
  <div class="feature-item">
    <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
    <div><div class="feature-title">Asuransi Lengkap</div><div class="feature-desc">Proteksi selama masa kredit</div></div>
  </div>
  <div class="feature-item">
    <div class="feature-icon"><i class="bi bi-calendar3"></i></div>
    <div><div class="feature-title">Cicilan Fleksibel</div><div class="feature-desc">Tenor 12–48 bulan</div></div>
  </div>
  <div class="feature-item">
    <div class="feature-icon"><i class="bi bi-truck"></i></div>
    <div><div class="feature-title">Antar ke Rumah</div><div class="feature-desc">Motor dikirim setelah disetujui</div></div>
  </div>
</div>

{{-- ══ KATEGORI ══════════════════════════════════════ --}}
<section class="section" id="kategori">
  <div class="section-label">Kategori Motor</div>

  <div class="d-flex justify-content-between align-items-end flex-wrap gap-3">
    <div>
      <h2 class="section-title">Temukan Motor<br>Sesuai Kebutuhan</h2>
      <p class="section-sub">Berbagai pilihan tipe motor tersedia untuk kamu kredit sekarang.</p>
    </div>

    @auth
      @if(auth()->user()->hasRole('client'))
        <a href="{{ route('client.motor.index') }}" style="font-size:14px;font-weight:600;color:var(--blue);text-decoration:none;">
          Lihat Semua <i class="bi bi-arrow-right"></i>
        </a>
      @endif
    @else
      <a href="{{ route('login') }}" style="font-size:14px;font-weight:600;color:var(--blue);text-decoration:none;">
        Lihat Semua <i class="bi bi-arrow-right"></i>
      </a>
    @endauth
  </div>

  <div class="kategori-grid">
    @forelse($jenisMotor->take(6) as $jenis)

    @php
      // TANPA "use" → langsung pakai full namespace
      $slug = \Illuminate\Support\Str::slug($jenis->jenis);

      // default gambar
      $img = 'images/hero.jpg';

      if (file_exists(public_path("images/kategori/$slug.jpg"))) {
        $img = "images/kategori/$slug.jpg";
      } elseif (file_exists(public_path("images/kategori/$slug.png"))) {
        $img = "images/kategori/$slug.png";
      }

      $link = auth()->check() && auth()->user()->hasRole('client')
              ? route('client.motor.index', ['jenis' => $jenis->id])
              : route('login');
    @endphp

    <a href="{{ $link }}" class="kategori-card">
      <img src="{{ asset($img) }}" alt="{{ $jenis->jenis }}">
      <div class="kategori-overlay"></div>

      <div class="kategori-body">
        <div class="kategori-name">{{ $jenis->jenis }}</div>
        <div class="kategori-arrow">
          <i class="bi bi-arrow-up-right"></i>
        </div>
      </div>
    </a>

    @empty

    @foreach(['Motor Sport','Motor Matic','Motor Listrik','Motor Bebek'] as $nama)

    @php
      $slug = \Illuminate\Support\Str::slug($nama);

      $img = 'images/hero.jpg';

      if (file_exists(public_path("images/kategori/$slug.jpg"))) {
        $img = "images/kategori/$slug.jpg";
      } elseif (file_exists(public_path("images/kategori/$slug.png"))) {
        $img = "images/kategori/$slug.png";
      }
    @endphp

    <a href="{{ route('login') }}" class="kategori-card">
      <img src="{{ asset($img) }}" alt="{{ $nama }}">
      <div class="kategori-overlay"></div>

      <div class="kategori-body">
        <div class="kategori-name">{{ $nama }}</div>
        <div class="kategori-arrow">
          <i class="bi bi-arrow-up-right"></i>
        </div>
      </div>
    </a>

    @endforeach

    @endforelse
  </div>
</section>

{{-- ══ MOTOR UNGGULAN ════════════════════════════════ --}}
<section class="section section-bg" id="motor-unggulan">
  <div class="section-label">Motor Unggulan</div>
  <div class="d-flex justify-content-between align-items-end flex-wrap gap-3">
    <h2 class="section-title">Motor Terpopuler<br>Pilihan Pelanggan</h2>
    @auth
      @if(auth()->user()->hasRole('client'))
        <a href="{{ route('client.motor.index') }}" style="font-size:14px;font-weight:600;color:var(--blue);text-decoration:none;">Lihat Semua <i class="bi bi-arrow-right"></i></a>
      @endif
    @else
      <a href="{{ route('login') }}" style="font-size:14px;font-weight:600;color:var(--blue);text-decoration:none;">Lihat Semua <i class="bi bi-arrow-right"></i></a>
    @endauth
  </div>

  <div class="motor-grid">
    @forelse($motorUnggulan as $m)
    <div class="motor-card">
      <div class="motor-card-img">
        @if($m->foto1)
          <img src="{{ asset('storage/'.$m->foto1) }}" alt="{{ $m->nama_motor }}">
        @else
          <span class="motor-emoji">🏍️</span>
        @endif
      </div>

      <div class="motor-card-body">
        <div class="motor-merk">
          {{ $m->merk }}
          @if($m->jenisMotor) · {{ $m->jenisMotor->jenis }} @endif
        </div>

        <div class="motor-name">{{ $m->nama_motor }}</div>

        <div class="motor-harga">
          Rp {{ number_format($m->harga_jual,0,',','.') }}
        </div>

        {{-- ❌ CICILAN DIHAPUS, TINGGAL STOK --}}
        <div class="motor-cicilan">
          <i class="bi bi-box-seam me-1"></i>
          Stok: {{ $m->stok }} unit
        </div>

        @auth
          @if(auth()->user()->hasRole('client'))
            <a href="{{ route('client.motor.show',$m) }}" class="btn-lihat">
              Lihat Detail <i class="bi bi-arrow-right"></i>
            </a>
          @endif
        @else
          <a href="{{ route('login') }}" class="btn-lihat">
            Login untuk lihat detail <i class="bi bi-arrow-right"></i>
          </a>
        @endauth
      </div>
    </div>
    @empty

    @for($i=0;$i<4;$i++)
    <div class="motor-card">
      <div class="motor-card-img">
        <span class="motor-emoji">🏍️</span>
      </div>

      <div class="motor-card-body">
        <div class="motor-merk">HONDA · MATIC</div>
        <div class="motor-name">Motor Contoh {{ $i+1 }}</div>
        <div class="motor-harga">Rp 20.000.000</div>

        {{-- ❌ CICILAN DIHAPUS --}}
        <div class="motor-cicilan">
          <i class="bi bi-box-seam me-1"></i>
          Stok: 5 unit
        </div>

        <a href="{{ route('login') }}" class="btn-lihat">
          Login untuk lihat detail <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
    @endfor

    @endforelse
  </div>
</section>

{{-- ══ CARA KERJA ════════════════════════════════════ --}}
<section class="section section-bg" id="cara-kerja">
  <div style="text-align:center;">
    <div class="section-label">Cara Kerja</div>
    <h2 class="section-title">Kredit Motor Semudah 4 Langkah Saja</h2>
    <p class="section-sub" style="margin:10px auto 0;">Dari pendaftaran hingga motor tiba di pintumu, semua bisa dilakukan online.</p>
  </div>
  <div class="steps-grid">
    <div class="step-card"><div class="step-num">1</div><div class="step-title">Daftar Akun</div><div class="step-desc">Buat akun Kredio gratis. Isi data diri dan verifikasi identitasmu dalam 2 menit.</div></div>
    <div class="step-card"><div class="step-num">2</div><div class="step-title">Pilih Motor</div><div class="step-desc">Jelajahi ratusan pilihan motor. Filter sesuai budget dan kebutuhanmu.</div></div>
    <div class="step-card"><div class="step-num">3</div><div class="step-title">Ajukan Kredit</div><div class="step-desc">Isi formulir pengajuan online. Tim kami proses dalam 1x24 jam.</div></div>
    <div class="step-card"><div class="step-num">4</div><div class="step-title">Motor Dikirim</div><div class="step-desc">Setelah disetujui, motor langsung dikirim ke alamatmu.</div></div>
  </div>
</section>

{{-- ══ CTA ═══════════════════════════════════════════ --}}
@guest
<section class="cta-section">
  <h2>Siap Punya Motor Impianmu?</h2>
  <p>Bergabung dengan ribuan pelanggan yang sudah merasakan kemudahan kredit motor bersama Kredio.</p>
  <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
    <a href="{{ route('register') }}" class="btn-cta-white"><i class="bi bi-person-plus"></i> Daftar Gratis Sekarang</a>
    <a href="{{ route('login') }}" class="btn-cta-outline"><i class="bi bi-box-arrow-in-right"></i> Sudah Punya Akun? Masuk</a>
  </div>
</section>
@endguest

{{-- ══ FOOTER ════════════════════════════════════════ --}}
<footer class="site-footer">
  <div class="footer-grid">
    <div>
      <div class="footer-brand">Kredio</div>
      <p class="footer-desc">Platform kredit motor online terpercaya. Proses cepat, cicilan ringan, pengiriman ke rumah.</p>
    </div>
    <div>
      <div class="footer-title">Layanan</div>
      <ul class="footer-links">
        <li><a href="#motor-unggulan">Katalog Motor</a></li>
        <li><a href="#cara-kerja">Cara Kredit</a></li>
        <li><a href="#kategori">Kategori</a></li>
        <li><a href="{{ route('register') }}">Daftar Sekarang</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-title">Akun</div>
      <ul class="footer-links">
        <li><a href="{{ route('login') }}">Masuk</a></li>
        <li><a href="{{ route('register') }}">Daftar</a></li>
        @auth
          @if(auth()->user()->hasRole('client'))
            <li><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('client.pengajuan.index') }}">Pengajuan Saya</a></li>
            <li><a href="{{ route('client.angsuran.index') }}">Angsuran</a></li>
          @endif
        @endauth
      </ul>
    </div>
    <div>
      <div class="footer-title">Kontak</div>
      <ul class="footer-links">
        <li><a href="#">info@kredio.id</a></li>
        <li><a href="#">0800-KREDIO</a></li>
        <li><a href="#">Indonesia</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-divider"></div>
  <div class="footer-bottom">
    <div>&copy; {{ date('Y') }} Kredio. Hak Cipta Dilindungi.</div>
    <div style="display:flex;gap:20px;">
      <a href="#">Kebijakan Privasi</a>
      <a href="#">Syarat &amp; Ketentuan</a>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click',e=>{
      const t=document.querySelector(a.getAttribute('href'));
      if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}
    });
  });
</script>
</body>
</html>