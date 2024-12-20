<?php

use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController; // Add this line for PembelianController
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\LaporanPembelianController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Middleware group for authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::resource('penjualan', PenjualanController::class);
    Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');

    // Adding resource routes for Pembelian
    Route::resource('pembelian', PembelianController::class);
    Route::get('pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
});

Route::resource('menus', MenuController::class);
Route::resource('stoks', StokController::class);
Route::resource('pelanggans', PelangganController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/penjualan/removeFromCart/{index}', [PenjualanController::class, 'removeFromCart'])->name('penjualan.removeFromCart');
Route::post('/pembelian/removeFromCart/{index}', [PembelianController::class, 'removeFromCart'])->name('pembelian.removeFromCart');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::post('/penjualan/process', [PenjualanController::class, 'process'])->name('penjualan.process');
Route::post('/pembelian/proses', [PembelianController::class, 'process'])->name('pembelian.process');

// Route for Laporan Penjualan (Only accessible by admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan_penjualan.index');
    Route::get('/laporan-penjualan/pdf', [LaporanPenjualanController::class, 'downloadPDF'])->name('laporan_penjualan.pdf');
    Route::get('/laporan-pembelian', [LaporanPembelianController::class, 'index'])->name('laporan_pembelian.index');
    Route::get('/laporan-pembelian/download-pdf', [LaporanPembelianController::class, 'downloadPDF'])->name('laporan_pembelian.downloadPDF');
});

Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
})->name('unauthorized');

Route::get('penjualan/struk/{id}', [PenjualanController::class, 'printStrukPenjualan'])->name('penjualan.printStruk');

require __DIR__.'/auth.php';
