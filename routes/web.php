<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengelolaController;

Route::get('/', function () {
    // Jika user sudah login, arahkan ke welcome page
    if (Auth::check()) {
        return view('welcome');
    }
    return view('welcome');
})->name('welcome');

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/browse', function () {
    return view('browse');
});

// Rute untuk halaman detail produk
Route::get('/product/{id}', function ($id) {
    // Di sini nantinya bisa mengambil data produk dari database berdasarkan ID
    return view('product-detail');
})->name('product.detail');

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

// Pengelola routes - protected with auth middleware
Route::prefix('pengelola')->middleware('auth')->group(function () {
    Route::get('/', [PengelolaController::class, 'index'])->name('pengelola.index');
    Route::get('/alamat', [PengelolaController::class, 'alamat'])->name('pengelola.alamat');
    Route::get('/transaksi', [PengelolaController::class, 'transaksi'])->name('pengelola.transaksi');
    Route::get('/nasabah', [PengelolaController::class, 'nasabah'])->name('pengelola.nasabah');
    Route::get('/laporan', [PengelolaController::class, 'laporan'])->name('pengelola.laporan');
});