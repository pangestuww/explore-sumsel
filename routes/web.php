<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NotificationController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPenggunaController;
use App\Http\Controllers\Admin\AdminDestinasiController;
use App\Http\Controllers\Admin\AdminBudayaController;
use App\Http\Controllers\Admin\AdminKulinerController;
use App\Http\Controllers\Admin\ProfileController;

// ============ PUBLIC ROUTES ============
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
Route::get('/destinasi/{slug}', [DestinasiController::class, 'show'])->name('destinasi.show');
Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya.index');
Route::get('/budaya/{slug}', [BudayaController::class, 'show'])->name('budaya.show');
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner.index');
Route::get('/kuliner/{slug}', [KulinerController::class, 'show'])->name('kuliner.show');
Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// ============ USER DASHBOARD & ACTIONS ============
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/favorit', [FavoritController::class, 'index'])->name('favorit.index');
    Route::post('/favorit/toggle/{destinasi_id}', [FavoritController::class, 'toggle'])->name('favorit.toggle');
    Route::post('/favorit', [FavoritController::class, 'store'])->name('favorit.store');
    Route::delete('/favorit/{type}/{id}', [FavoritController::class, 'destroy'])->name('favorit.destroy');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

    Route::get('/notifications/fetch', [NotificationController::class, 'fetch'])->name('notifications.fetch');
    Route::post('/notifications/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read/{id}', [NotificationController::class, 'markSingleAsRead'])->name('notifications.read.single');
});

// ============ ADMIN DASHBOARD ============
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Kelola Pengguna
    Route::get('/pengguna/api', [AdminPenggunaController::class, 'apiIndex'])->name('pengguna.api');
    Route::get('/pengguna', [AdminPenggunaController::class, 'index'])->name('pengguna.index');
    Route::delete('/pengguna/{user}', [AdminPenggunaController::class, 'destroy'])->name('pengguna.destroy');

    // Kelola Profil Admin
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', function () {
        return redirect()->route('admin.dashboard');
    })->name('profile.index');

    // Kelola Destinasi
    Route::get('/destinasi', [AdminDestinasiController::class, 'index'])->name('destinasi.index');
    Route::get('/destinasi/create', [AdminDestinasiController::class, 'create'])->name('destinasi.create');
    Route::post('/destinasi', [AdminDestinasiController::class, 'store'])->name('destinasi.store');
    Route::get('/destinasi/{id}/edit', [AdminDestinasiController::class, 'edit'])->name('destinasi.edit');
    Route::put('/destinasi/{id}', [AdminDestinasiController::class, 'update'])->name('destinasi.update');
    Route::delete('/destinasi/{id}', [AdminDestinasiController::class, 'destroy'])->name('destinasi.destroy');

    // Kelola Budaya
    Route::get('/budaya', [AdminBudayaController::class, 'index'])->name('budaya.index');
    Route::get('/budaya/create', [AdminBudayaController::class, 'create'])->name('budaya.create');
    Route::post('/budaya', [AdminBudayaController::class, 'store'])->name('budaya.store');
    Route::get('/budaya/{id}/edit', [AdminBudayaController::class, 'edit'])->name('budaya.edit');
    Route::put('/budaya/{id}', [AdminBudayaController::class, 'update'])->name('budaya.update');
    Route::delete('/budaya/{id}', [AdminBudayaController::class, 'destroy'])->name('budaya.destroy');

    // Kelola Kuliner
    Route::get('/kuliner', [AdminKulinerController::class, 'index'])->name('kuliner.index');
    Route::get('/kuliner/create', [AdminKulinerController::class, 'create'])->name('kuliner.create');
    Route::post('/kuliner', [AdminKulinerController::class, 'store'])->name('kuliner.store');
    Route::get('/kuliner/{id}/edit', [AdminKulinerController::class, 'edit'])->name('kuliner.edit');
    Route::put('/kuliner/{id}', [AdminKulinerController::class, 'update'])->name('kuliner.update');
    Route::delete('/kuliner/{id}', [AdminKulinerController::class, 'destroy'])->name('kuliner.destroy');
});

require __DIR__ . '/auth.php';
