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
use App\Http\Controllers\Pengelola\PoinController;

Route::post('/artikel/{artikel}/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/artikel/{artikel}/feedback', [ArtikelController::class, 'allFeedback'])->name('artikel.allFeedback');

Route::get('/', function () {
    if (Auth::check()) {
        return view('welcome');
    }
    return view('welcome');
})->name('welcome');

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
Route::get('/toko/{id}', [TokoController::class, 'detail'])->name('toko.detail');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/store/{id}', function ($id) {
    return view('store-detail');
})->name('store.detail');

// Authentication routes
Auth::routes();
Route::get('/home', function () {
    return redirect('/');
})->name('home');
Route::get('/profile', [HomeController::class, 'index'])->name('profile');

// Admin routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
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

// Transaksi routes
Route::prefix('transaksi')->middleware('auth')->group(function () {
    Route::get('/pesanan', [TransaksiController::class, 'pesananAktif'])->name('transaksi.pesanan');
    Route::get('/riwayat', [TransaksiController::class, 'riwayatTransaksi'])->name('transaksi.riwayat');
    Route::post('/upload-bukti', [TransaksiController::class, 'uploadBukti'])->name('transaksi.upload-bukti');
    Route::get('/detail/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
    Route::post('/cancel/{id}', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
    Route::post('/complete/{id}', [TransaksiController::class, 'complete'])->name('transaksi.complete');
});

Route::get('/check-data', [DataController::class, 'index']);

// Nasabah routes
Route::middleware('auth')->group(function () {
    Route::get('/nasabah/dashboard', function () {
        return view('nasabah.dashboard');
    })->name('nasabah.dashboard');
    
    Route::get('/nasabah/notifikasi', function () {
        return view('components.profile.notifikasi');
    })->name('notifikasi');
    
    Route::get('/nasabah/poin-saya', function () {
        return view('components.profile.poin-saya');
    })->name('poin-saya');
});

// Pengelola routes
Route::middleware(['auth'])->group(function () {
    Route::get('/pengelola', [PengelolaController::class, 'index'])->name('pengelola.index');
    Route::get('/pengelola/alamat', [PengelolaController::class, 'alamat'])->name('pengelola.alamat');
    Route::get('/pengelola/toko', [ProductController::class, 'toko'])->name('pengelola.toko');
    Route::get('/pengelola/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
    Route::get('/pengelola/nasabah', [PengelolaController::class, 'nasabah'])->name('pengelola.nasabah');
    Route::get('/pengelola/laporan', [PengelolaController::class, 'laporan'])->name('pengelola.laporan');
    Route::get('/pengelola/pesanan', [PengelolaController::class, 'pesanan'])->name('pengelola.pesanan');
    
    // Product routes
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
    Route::resource('/pengelola/products', ProductController::class);
    Route::post('/produk/{id}/like', [ProductController::class, 'toggleLike'])->name('produk.like');
});

Route::get('/stores', [\App\Http\Controllers\PBS\PengelolaController::class, 'stores'])->name('stores.index');


// Route::get('/pengelola/poin', [PengelolaController::class, 'poin'])->name('pengelola.poin');
Route::get('/pengelola/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');

Route::middleware(['auth', 'role:pengelola'])->prefix('pengelola')->name('pengelola.')->group(function () {
    Route::get('/poin', [PoinController::class, 'index'])->name('poin.index');
    Route::post('/poin/konversi', [PoinController::class, 'store'])->name('poin.store');
    Route::get('/api/users/search', [PoinController::class, 'searchUser'])->name('api.users.search');
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});