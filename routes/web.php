<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengelolaController;

use App\Http\Controllers\EventController;

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

Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/browse', function () {
    return view('browse');
})->name('browse.index');

Route::get('/toko/{id}', [TokoController::class, 'detail'])->name('toko.detail');

// Rute untuk halaman detail produk
Route::get('/product/{id}', function ($id) {
    // Di sini nantinya bisa mengambil data produk dari database berdasarkan ID
    return view('product-detail');
})->name('product.detail');

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
    Route::get('/artikel', [AdminController::class, 'artikel'])->name('admin.artikel');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
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
    Route::get('/pengelola/toko', [PengelolaController::class, 'toko'])->name('pengelola.toko');
    Route::get('/pengelola/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
    Route::get('/pengelola/poin', [PengelolaController::class, 'poin'])->name('pengelola.poin');
    Route::get('/pengelola/nasabah', [PengelolaController::class, 'nasabah'])->name('pengelola.nasabah');
    Route::get('/pengelola/laporan', [PengelolaController::class, 'laporan'])->name('pengelola.laporan');
    Route::get('/pengelola/pesanan', [PengelolaController::class, 'pesanan'])->name('pengelola.pesanan');
});

// Article detail route with slug
Route::get('/artikel/{slug}', function ($slug) {
    // Ambil data artikel dari database berdasarkan $slug
    return view('article-detail');
})->name('article.detail');