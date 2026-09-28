<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController; // 1. Import PosController

Route::get('/', function () {
    return redirect()->route('login');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // 2. Daftarkan route pos.index di sini
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
});

// Admin Only Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

    // Tambahkan route ini:
    Route::get('/reports/sales', function () {
        return view('reports.sales'); // atau sesuaikan dengan controller laporan jika sudah ada
    })->name('report.sales');
});

use App\Http\Controllers\PurchaseController;

// Route untuk mengirim data (submit) pembelian
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
