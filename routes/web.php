<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PembudidayaController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\BenihController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PemberianPakanController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\LaporanController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Protected Routes (must login)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    
    // CRUD Pembudidaya
    Route::resource('pembudidaya', PembudidayaController::class);
    
    // CRUD Kolam
    Route::resource('kolam', KolamController::class);
    
    // CRUD Benih
    Route::resource('benih', BenihController::class);
    
    // CRUD Pakan
    Route::resource('pakan', PakanController::class);
    
    // CRUD Pemberian Pakan
    Route::resource('pemberian-pakan', PemberianPakanController::class);
    
    // CRUD Panen
    Route::resource('panen', PanenController::class);
    
    // CRUD Penjualan
    Route::resource('penjualan', PenjualanController::class);
    
    // CRUD Promosi
    Route::resource('promosi', PromosiController::class);
    
    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

require __DIR__.'/auth.php';