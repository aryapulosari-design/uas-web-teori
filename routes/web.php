<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PublikController;

/*
|--------------------------------------------------------------------------
| Route Halaman Pengunjung (Publik)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublikController::class, 'index'])->name('publik.index');
Route::get('/beranda', [PublikController::class, 'index'])->name('publik.beranda');
Route::get('/artikel/{id}', [PublikController::class, 'show'])->name('publik.show')->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Route Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Route CMS (Admin) — Dilindungi Middleware Auth
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('penulis', PenulisController::class)->parameters(['penulis' => 'penulis']);
    Route::resource('kategori_artikel', KategoriArtikelController::class)->except(['show']);
    Route::resource('artikel', ArtikelController::class);
});
