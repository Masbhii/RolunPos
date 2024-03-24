<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CoaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/menu', MenuController::class)->middleware(['auth']);
Route::get('/menu/destroy/{id}', [MenuController::class, 'destroy'])->middleware(['auth']);

Route::resource('/pelanggan', PelangganController::class)->middleware(['auth']);
Route::get('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->middleware(['auth']);

Route::resource('/pegawai', PegawaiController::class)->middleware(['auth']);
Route::get('/pegawai/destroy/{id}', [PegawaiController::class, 'destroy'])->middleware(['auth']);

Route::resource('/kategori', KategoriController::class)->middleware(['auth']);
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->middleware(['auth']);

Route::resource('/coa', CoaController::class)->middleware(['auth']);
Route::get('/coa/destroy/{id}', [CoaController::class, 'destroy'])->middleware(['auth']);


require __DIR__.'/auth.php';
