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
use App\Http\Controllers\Workspace\TokoController; // Add this line
use App\Http\Controllers\Workspace\EventController;
use App\Http\Controllers\ArtikelController;

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/{id}', function ($id) {
    return view('events.detail');
})->name('events.detail');

Route::get('/', function () {
    // Jika user sudah login, arahkan ke welcome page
    if (Auth::check()) {
        return view('welcome');
    }
    return view('welcome');
})->name('welcome');

Route::get('/artikel', [\App\Http\Controllers\ArtikelController::class, 'landing'])->name('artikel.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/browse', [PengelolaController::class, 'browse'])->name('browse');

Route::get('/toko/{id}', [TokoController::class, 'detail'])->name('toko.detail');

// Rute untuk halaman detail produk
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::get('/store/{id}', function ($id) {
    return view('store-detail');
})->name('store.detail');

// Authentication routes
Auth::routes();

// Home route - setelah login akan diarahkan ke welcome page
Route::get('/home', function () {
    return redirect('/');
})->name('home');

// Profile route for authenticated users - integrated with dashboard based on role
Route::get('/profile', [HomeController::class, 'index'])->name('profile');

// Admin routes - protected with auth middleware
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    // Route untuk create artikel HARUS di atas route dengan parameter slug
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('article.detail');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    // Route untuk edit artikel
    Route::get('/admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    // Route untuk update artikel
    Route::put('/admin/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    // Route untuk hapus artikel
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
    Route::post('/artikel/{artikelId}/feedback', [ArtikelController::class, 'storeFeedback'])->name('feedback.store');
});

// Transaksi routes - protected with auth middleware
Route::prefix('transaksi')->middleware('auth')->group(function () {
    Route::get('/pesanan', [TransaksiController::class, 'pesananAktif'])->name('transaksi.pesanan');
    Route::get('/riwayat', [TransaksiController::class, 'riwayatTransaksi'])->name('transaksi.riwayat');
    Route::post('/upload-bukti', [TransaksiController::class, 'uploadBukti'])->name('transaksi.upload-bukti');
    Route::get('/detail/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
    Route::post('/cancel/{id}', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
    Route::post('/complete/{id}', [TransaksiController::class, 'complete'])->name('transaksi.complete');
});

Route::get('/check-data', [DataController::class, 'index']);

// Dashboard untuk nasabah
Route::get('/nasabah/dashboard', function () {
    return view('nasabah.dashboard');
})->middleware('auth')->name('nasabah.dashboard');

// Route for Notifikasi page
Route::get('/nasabah/notifikasi', function () {
    return view('components.profile.notifikasi');
})->middleware('auth')->name('notifikasi');

// Route for Poin Saya page
Route::get('/nasabah/poin-saya', function () {
    return view('components.profile.poin-saya');
})->middleware('auth')->name('poin-saya');

// Pengelola routes - protected with auth and role middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/pengelola', [PengelolaController::class, 'index'])->name('pengelola.index');
    Route::get('/pengelola/alamat', [PengelolaController::class, 'alamat'])->name('pengelola.alamat');
    Route::get('/pengelola/toko', [ProductController::class, 'toko'])->name('pengelola.toko');
    Route::get('/pengelola/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
    Route::get('/pengelola/poin', [PengelolaController::class, 'poin'])->name('pengelola.poin');
    Route::get('/pengelola/nasabah', [PengelolaController::class, 'nasabah'])->name('pengelola.nasabah');
    Route::get('/pengelola/laporan', [PengelolaController::class, 'laporan'])->name('pengelola.laporan');
    Route::get('/pengelola/pesanan', [PengelolaController::class, 'pesanan'])->name('pengelola.pesanan');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
  
    // Add resource routes for products
    Route::resource('/pengelola/products', \App\Http\Controllers\PBS\ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    // Update this route to match the URL we're using
    Route::post('/produk/{id}/like', [ProductController::class, 'toggleLike'])->name('produk.like');
});

Route::get('/stores', [\App\Http\Controllers\PBS\PengelolaController::class, 'stores'])->name('stores.index');