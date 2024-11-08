<?php

use App\Http\Controllers\PenjualanController; // Pastikan Anda menambahkan controller yang diperlukan
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Pastikan Anda memiliki rute resource untuk Penjualan yang dilindungi middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('penjualan', PenjualanController::class);
    Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');

});

Route::resource('menus', MenuController::class);
Route::resource('stoks', StokController::class);
Route::resource('pelanggans', PelangganController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';