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
Route::post('/artikel/{id}/like', [ArtikelController::class, 'like'])->name('artikel.like')->middleware('auth');


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
Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [App\Http\Controllers\Workspace\ProfileController::class, 'update'])->name('profile.update');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/api/visit-stats', [AdminController::class, 'getVisitStats'])->name('api.visit_stats');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('pengajuan');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ArtikelController::class, 'favoritSaya'])->name('nasabah.profil');
});
Route::get('/profil', [ArtikelController::class, 'showProfil'])->middleware('auth')->name('nasabah.profil');

    // Event routes
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
    
    // Artikel routes (CRUD)
    // Path yang dihasilkan akan menjadi '/admin/artikel/...'
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');            // /admin/artikel
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');  // /admin/artikel/create
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');          // /admin/artikel (POST)

    // Route untuk edit artikel
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');   // /admin/artikel/{id}/edit

    // Route untuk update artikel
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');    // /admin/artikel/{id}

    // Route untuk hapus artikel
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy'); // /admin/artikel/{id}

    // Tidak perlu route tambahan untuk alias, nama route otomatis menggunakan prefix 'admin.'

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
    
    Route::get('/nasabah/notifikasi', [ProfileController::class, 'notifikasi'])->name('notifikasi');
    
    // Delete single notification
    Route::delete('/nasabah/notifikasi/{id}', [ProfileController::class, 'deleteNotification'])->name('notifikasi.delete');

    // Clear all notifications
    Route::delete('/nasabah/notifikasi', [ProfileController::class, 'clearNotifications'])->name('notifikasi.clear');

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
    Route::get('/pengelola/riwayat', [PengelolaController::class, 'riwayat'])->name('pengelola.riwayat');
    
    // Product routes khusus pengelola (gunakan prefix /pengelola/products dari resource)
    Route::resource('/pengelola/products', ProductController::class);
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

// Like / Unlike produk (dapat diakses oleh semua user yang login)
Route::middleware('auth')->post('/produk/{id}/like', [ProductController::class, 'toggleLike'])->name('produk.like');

// Debug route (development only)
Route::middleware('auth')->get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
})->name('debug.sentry');