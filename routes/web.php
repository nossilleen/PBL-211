<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/browse', function () {
    return view('browse');
});

// Authentication routes
Auth::routes();

// Home route - redirects to appropriate dashboard based on role
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Profile route for authenticated users
Route::get('/profile', function() {
    return view('profile');
})->middleware('auth')->name('profile');

// Admin routes - protected with auth middleware
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/artikel', [AdminController::class, 'artikel'])->name('admin.artikel');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
});

Route::get('/check-data', [DataController::class, 'index']);