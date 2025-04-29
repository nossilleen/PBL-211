<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/artikel', [AdminController::class, 'artikel'])->name('admin.artikel');

Route::get('/admin/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');

Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');

Route::get('/browse', function () {
    return view('browse');
});


Auth::routes();