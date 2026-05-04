<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => true]);

// Landing page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Midtrans callback (tanpa CSRF)
Route::post('/midtrans/callback', [App\Http\Controllers\Client\MidtransController::class, 'webhook'])
    ->name('midtrans.callback')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/midtrans/finish',   [App\Http\Controllers\Client\MidtransController::class, 'finish'])->name('midtrans.finish');
Route::get('/midtrans/unfinish', [App\Http\Controllers\Client\MidtransController::class, 'unfinish'])->name('midtrans.unfinish');
Route::get('/midtrans/error',    [App\Http\Controllers\Client\MidtransController::class, 'error'])->name('midtrans.error');

// ── PROFILE BERSAMA (admin, marketing, ceo) ────────────────────
Route::middleware(['auth'])->group(function () {
    Route::get('/profile',  [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile',  [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// ═══════════════════════════════════════════════════════════════
// ADMIN — Hero Banner | Dashboard | Jenis Motor | Data Motor
// ═══════════════════════════════════════════════════════════════
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Hero Banner
        Route::get('/hero', [App\Http\Controllers\Admin\HeroController::class, 'index'])->name('hero.index');
        Route::put('/hero', [App\Http\Controllers\Admin\HeroController::class, 'update'])->name('hero.update');

        // Jenis Motor (CRUD)
        Route::resource('jenis-motor', App\Http\Controllers\Admin\JenisMotorController::class);

        // Data Motor (CRUD)
        Route::resource('motor', App\Http\Controllers\Admin\MotorController::class);

        // Jenis Cicilan (CRUD)
        Route::resource('jenis-cicilan', App\Http\Controllers\Admin\JenisCicilanController::class);

        // Manajemen User
        Route::resource('users', App\Http\Controllers\Admin\UserController::class)
            ->only(['index', 'create', 'store', 'destroy']);
    });

// ═══════════════════════════════════════════════════════════════
// MARKETING — Pengajuan | Angsuran & Kwitansi | Pengiriman | Asuransi
// ═══════════════════════════════════════════════════════════════
Route::middleware(['auth', 'role:marketing'])
    ->prefix('marketing')
    ->name('marketing.')
    ->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Marketing\DashboardController::class, 'index'])->name('dashboard');

        // Pengajuan Kredit
        Route::resource('pengajuan', App\Http\Controllers\Marketing\PengajuanController::class)
            ->only(['index', 'show']);
        Route::post('pengajuan/{id}/approve',    [App\Http\Controllers\Marketing\PengajuanController::class, 'approve'])->name('pengajuan.approve');
        Route::post('pengajuan/{id}/approve-dp', [App\Http\Controllers\Marketing\PengajuanController::class, 'approveDP'])->name('pengajuan.approve-dp');
        Route::post('pengajuan/{id}/reject',     [App\Http\Controllers\Marketing\PengajuanController::class, 'reject'])->name('pengajuan.reject');

        // Angsuran + Kwitansi
        Route::resource('angsuran', App\Http\Controllers\Marketing\AngsuranController::class)
            ->only(['index', 'show', 'update']);
        Route::post('angsuran/{angsuran}/macet',   [App\Http\Controllers\Marketing\AngsuranController::class, 'tandaiMacet'])->name('angsuran.macet');
        Route::get('angsuran/{angsuran}/kwitansi', [App\Http\Controllers\Marketing\AngsuranController::class, 'cetakKwitansi'])->name('angsuran.kwitansi');

        // Pengiriman
        Route::resource('pengiriman', App\Http\Controllers\Marketing\PengirimanController::class)
            ->only(['index', 'show', 'update']);

        // Asuransi (CRUD penuh)
        Route::resource('asuransi', App\Http\Controllers\Marketing\AsuransiController::class);
    });

// ═══════════════════════════════════════════════════════════════
// CEO — Dashboard+Laporan | Data Pelanggan | Manajemen User
// ═══════════════════════════════════════════════════════════════
Route::middleware(['auth', 'role:ceo'])
    ->prefix('ceo')
    ->name('ceo.')
    ->group(function () {

        Route::get('/dashboard',            [App\Http\Controllers\Ceo\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/laporan/penjualan',    [App\Http\Controllers\Ceo\DashboardController::class, 'laporanPenjualan'])->name('laporan.penjualan');
        Route::get('/laporan/kredit-macet', [App\Http\Controllers\Ceo\DashboardController::class, 'kreditMacet'])->name('laporan.kredit-macet');

        // Pelanggan (read-only)
        Route::resource('pelanggan', App\Http\Controllers\Ceo\PelangganController::class)
            ->only(['index', 'show']);

        // Manajemen User (CRUD)
        Route::resource('users', App\Http\Controllers\Ceo\UserController::class)
            ->only(['index', 'create', 'store', 'destroy']);
    });

// ═══════════════════════════════════════════════════════════════
// CLIENT — Dashboard | Katalog | Pengajuan | Angsuran | Tracking
// ═══════════════════════════════════════════════════════════════
Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');

        // Katalog Motor
        Route::resource('motor', App\Http\Controllers\Client\MotorController::class)
            ->only(['index', 'show']);

        // Pengajuan Kredit
        Route::resource('pengajuan', App\Http\Controllers\Client\PengajuanController::class)
            ->only(['index', 'create', 'store', 'show']);

        // Angsuran
        Route::resource('angsuran', App\Http\Controllers\Client\AngsuranController::class)
            ->only(['index', 'show']);
        Route::post('angsuran/{angsuran}/bayar', [App\Http\Controllers\Client\AngsuranController::class, 'bayar'])->name('angsuran.bayar');
        Route::get('angsuran/{angsuran}/bukti',  [App\Http\Controllers\Client\AngsuranController::class, 'buktiPembayaran'])->name('angsuran.bukti');

        // Tracking Pengiriman
        Route::get('tracking/{kredit_id}', [App\Http\Controllers\Client\TrackingController::class, 'show'])->name('tracking.show');

        // Midtrans
        Route::get('pengajuan/{pengajuan}/bayar-dp',     [App\Http\Controllers\Client\MidtransController::class, 'bayarDP'])->name('midtrans.bayar-dp');
        Route::get('angsuran/{angsuran}/bayar-midtrans', [App\Http\Controllers\Client\MidtransController::class, 'bayarAngsuran'])->name('midtrans.bayar-angsuran');

        // Profile client (data pelanggan + foto)
        Route::get('/profile',  [App\Http\Controllers\Client\ProfileController::class, 'edit'])->name('profile');
        Route::put('/profile',  [App\Http\Controllers\Client\ProfileController::class, 'update'])->name('profile.update');
    });
