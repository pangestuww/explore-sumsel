<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Destinasi
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
Route::get('/destinasi/{slug}', [DestinasiController::class, 'show'])->name('destinasi.show');

// Budaya
Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya.index');
Route::get('/budaya/{slug}', [BudayaController::class, 'show'])->name('budaya.show');

// Kuliner
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner.index');
Route::get('/kuliner/{slug}', [KulinerController::class, 'show'])->name('kuliner.show');

// Peta
Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
