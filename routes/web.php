<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
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
    Route::get('/reservasi/step-pertama', [FrontendReservasiController::class, 'stepPertama'])->name('reservasis.step.pertama');
    Route::post('/reservasi/step-pertama', [FrontendReservasiController::class, 'storeStepPertama'])->name('reservasis.store.step.pertama');
    Route::get('/reservasi/step-kedua', [FrontendReservasiController::class, 'stepKedua'])->name('reservasis.step.kedua');
    Route::post('/reservasi/step-kedua', [FrontendReservasiController::class, 'storeStepKedua'])->name('reservasis.store.step.kedua');
    Route::get('/Terima Kasih', [WelcomeController::class, 'Terima Kasih'])->name('Terima Kasih');
});

Route::resource('/menu', MenuController::class)->middleware(['auth']);
Route::get('/menu/destroy/{id}', [MenuController::class, 'destroy'])->middleware(['auth']);
Route::resource('/reservasi', ReservationController::class);


require __DIR__.'/auth.php';
