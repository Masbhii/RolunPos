<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembayaranController;
use GuzzleHttp\Middleware;
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

Route::resource('/barang', BarangController::class)->middleware(['auth']);
Route::get('/barang/destroy/{id}',[BarangController::class, 'destroy'])->middleware(['auth']);

Route::resource('/supplier', SupplierController::class)->middleware(['auth']);
Route::get('/supplier/destroy/{id}',[SupplierController::class, 'destroy'])->middleware(['auth']);

// transaksi pembayaran viewkeranjang
Route::get('pembayaran/viewkeranjang', [App\Http\Controllers\PembayaranController::class,'viewkeranjang'])->middleware(['auth']);
Route::get('pembayaran/viewstatus', [App\Http\Controllers\PembayaranController::class,'viewstatus'])->middleware(['auth']); 
Route::get('pembayaran/viewapprovalstatus', [App\Http\Controllers\PembayaranController::class,'viewapprovalstatus'])->middleware(['auth']);
Route::get('pembayaran/approve/{no_transaksi}', [App\Http\Controllers\PembayaranController::class,'approve'])->middleware(['auth']);
Route::get('pembayaran/unapprove/{no_transaksi}', [App\Http\Controllers\PembayaranController::class,'unapprove'])->middleware(['auth']);
Route::get('pembayaran/viewstatusPG', [App\Http\Controllers\PembayaranController::class,'viewstatusPG'])->middleware(['auth']);
Route::resource('pembayaran', PembayaranController::class)->middleware(['auth']);

Route::get('jurnal/umum', [App\Http\Controllers\JurnalController::class,'jurnalumum'])->middleware(['auth']);
Route::get('jurnal/viewdatajurnalumum/{periode}', [App\Http\Controllers\JurnalController::class,'viewdatajurnalumum'])->middleware(['auth']);
Route::get('jurnal/bukubesar', [App\Http\Controllers\JurnalController::class,'bukubesar'])->middleware(['auth']);
Route::get('jurnal/viewdatabukubesar/{periode}/{akun}', [App\Http\Controllers\JurnalController::class,'viewdatabukubesar'])->middleware(['auth']);

require __DIR__.'/auth.php';
