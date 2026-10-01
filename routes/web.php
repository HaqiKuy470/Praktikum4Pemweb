<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/berita');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
