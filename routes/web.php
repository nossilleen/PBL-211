<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Workspace\HomeController;
use App\Http\Controllers\Workspace\DataController;
use App\Http\Controllers\Workspace\TransaksiController;
use App\Http\Controllers\PBS\PengelolaController;
use App\Http\Controllers\PBS\ProductController;
use App\Http\Controllers\PBS\BrowseController;
use App\Http\Controllers\Workspace\TokoController;
use App\Http\Controllers\Workspace\EventController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PBS\PoinController;
use App\Http\Controllers\Workspace\UpgradeController;
use App\Http\Controllers\Workspace\ProfileController;

Route::post('/artikel/{artikel}/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/artikel/{artikel}/feedback', [ArtikelController::class, 'allFeedback'])->name('artikel.allFeedback');

Route::get('/', [HomeController::class, 'landingPage'])->name('welcome');

// Public routes
Route::get('/artikel', [ArtikelController::class, 'landing'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::post('/artikel/{id}/feedback', [ArtikelController::class, 'storeFeedback'])->name('artikel.feedback.store');
Route::get('/events', [EventController::class, 'list'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/browse', [PengelolaController::class, 'browse'])->name('browse');
Route::get('/toko/{id}', [TokoController::class, 'detail'])
    ->name('toko.detail')
    ->middleware('web');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// Authentication routes
Auth::routes();
Route::get('/home', function () {
    return redirect('/');
})->name('home');
Route::get('/profile', [HomeController::class, 'index'])->name('profile');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('pengajuan');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    
    // Event routes
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
    
    // Artikel routes
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    // Route untuk edit artikel
    Route::get('/admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    // Route untuk update artikel
    Route::put('/admin/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    // Route untuk hapus artikel
    Route::delete('/admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::delete('admin/artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::post('/artikel/{artikelId}/feedback', [ArtikelController::class, 'storeFeedback'])->name('feedback.store');
});

// Pengajuan routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::patch('/pengajuan/{id}/approve', [AdminController::class, 'approvePengajuan'])->name('admin.pengajuan.approve');
    Route::patch('/pengajuan/{id}/reject', [AdminController::class, 'rejectPengajuan'])->name('admin.pengajuan.reject');
});

// Transaksi routes
Route::prefix('transaksi')->middleware(['auth', 'role:nasabah'])->group(function () {
    Route::get('/pesanan', [TransaksiController::class, 'pesananAktif'])->name('transaksi.pesanan');
    Route::get('/riwayat', [TransaksiController::class, 'riwayatTransaksi'])->name('transaksi.riwayat');
    Route::post('/upload-bukti', [TransaksiController::class, 'uploadBukti'])->name('transaksi.upload-bukti');
    Route::get('/detail/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
    Route::post('/cancel/{id}', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
    Route::post('/complete/{id}', [TransaksiController::class, 'complete'])->name('transaksi.complete');
    Route::post('/beli', [TransaksiController::class, 'beli'])->name('produk.beli');
});

Route::get('/check-data', [DataController::class, 'index']);

// Nasabah routes
Route::middleware(['auth', 'role:nasabah'])->group(function () {
    Route::get('/nasabah/dashboard', function () {
        return view('nasabah.dashboard');
    })->name('nasabah.dashboard');
    
    Route::get('/nasabah/notifikasi', function () {
        return view('components.profile.notifikasi');
    })->name('notifikasi');
    
    Route::get('/nasabah/poin-saya', function () {
        return view('components.profile.poin-saya');
    })->name('poin-saya');

    Route::post('/nasabah/upgrade', [UpgradeController::class, 'UpgradeRequest'])->name('nasabah.upgrade');
    Route::get('/profile/pesanan/{id}/detail', [ProfileController::class, 'pesananDetail'])
        ->name('profile.pesanan.detail')
        ->middleware('auth');
});

// Pengelola routes
Route::middleware(['auth', 'role:pengelola'])->group(function () {
    Route::get('/pengelola', [PengelolaController::class, 'index'])->name('pengelola.index');
    Route::get('/pengelola/alamat', [PengelolaController::class, 'alamat'])->name('pengelola.alamat');
    Route::post('/pengelola/alamat/update', [PengelolaController::class, 'updateAlamat'])->name('pengelola.alamat.update');
    Route::get('/pengelola/toko', [ProductController::class, 'toko'])->name('pengelola.toko');
    Route::get('/pengelola/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
    Route::get('/pengelola/nasabah', [PengelolaController::class, 'nasabah'])->name('pengelola.nasabah');
    Route::get('/pengelola/laporan', [PengelolaController::class, 'laporan'])->name('pengelola.laporan');
    Route::get('/pengelola/pesanan', [PengelolaController::class, 'pesanan'])->name('pengelola.pesanan');
    
    // Product routes khusus pengelola (gunakan prefix /pengelola/products dari resource)
    Route::resource('/pengelola/products', ProductController::class);
    Route::post('/produk/{id}/like', [ProductController::class, 'toggleLike'])->name('produk.like');
    Route::put('/pengelola/toko/update', [ProductController::class, 'updateToko'])->name('pengelola.toko.update');
});

Route::get('/stores', [\App\Http\Controllers\PBS\PengelolaController::class, 'stores'])->name('stores.index');

// Pengelola pesanan management routes
Route::middleware(['auth', 'role:pengelola'])->group(function () {
    // Show pesanan table (make sure this uses pesananMasuk, not pesanan)
    Route::get('/pengelola/pesanan', [\App\Http\Controllers\PBS\PengelolaController::class, 'pesananMasuk'])->name('pengelola.pesanan');

    // Verifikasi pesanan (set status to sedang dikirim)
    Route::post('/pengelola/pesanan/{id}/verifikasi', [\App\Http\Controllers\PBS\PengelolaController::class, 'verifikasi'])->name('pengelola.pesanan.verifikasi');

    // Tandai pesanan selesai
    Route::post('/pengelola/pesanan/{id}/selesai', [\App\Http\Controllers\PBS\PengelolaController::class, 'selesai'])->name('pengelola.pesanan.selesai');

    // Add this new route for rejecting orders
    Route::post('/pengelola/pesanan/{id}/tolak', [\App\Http\Controllers\PBS\PengelolaController::class, 'tolak'])
        ->name('pengelola.pesanan.tolak');
});

Route::middleware(['auth', 'role:nasabah'])->group(function () {
    Route::get('/nasabah/pesanan/{id}/detail', [Workspace\NasabahController::class, 'pesananDetail'])
        ->name('nasabah.pesanan.detail');
});

// Admin password reset routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/admin/users/{user}/reset-password', [App\Http\Controllers\Admin\UserPasswordController::class, 'resetPassword'])
        ->name('admin.users.reset-password');
});

// Forced password change routes
Route::middleware(['auth'])->group(function () {
    Route::get('/password/force-change', [App\Http\Controllers\Admin\UserPasswordController::class, 'showForceChangeForm'])
        ->name('password.force-change');
    Route::post('/password/force-update', [App\Http\Controllers\Admin\UserPasswordController::class, 'forceChange'])
        ->name('password.force-update');
});

// Pengelola Poin management routes (role protected)
Route::middleware(['auth', 'role:pengelola'])->prefix('pengelola')->name('pengelola.')->group(function () {
    Route::get('/poin', [PoinController::class, 'index'])->name('poin.index');
    Route::post('/poin/konversi', [PoinController::class, 'store'])->name('poin.store');
    Route::get('/api/users/search', [PoinController::class, 'searchUser'])->name('api.users.search');
});

// Debug route (development only)
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});