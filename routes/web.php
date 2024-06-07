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
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\GrafikController;
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

Route::resource('/pembelian', PembelianController::class)->middleware(['auth']);
Route::get('/pembelian/destroy/{id}',[PembelianController::class, 'destroy'])->middleware(['auth']);

Route::get('jurnal/umum', [App\Http\Controllers\JurnalController::class,'jurnalumum'])->middleware(['auth']);
Route::get('jurnal/viewdatajurnalumum/{periode}', [App\Http\Controllers\JurnalController::class,'viewdatajurnalumum'])->middleware(['auth']);
Route::get('jurnal/bukubesar', [App\Http\Controllers\JurnalController::class,'bukubesar'])->middleware(['auth']);
Route::get('jurnal/viewdatabukubesar/{periode}/{akun}', [App\Http\Controllers\JurnalController::class,'viewdatabukubesar'])->middleware(['auth']);

// untuk transaksi penjualan
Route::get('penjualan/barang/{id}', [App\Http\Controllers\PenjualanController::class,'getDataBarang'])->middleware(['auth']);
Route::get('penjualan/keranjang', [App\Http\Controllers\PenjualanController::class,'keranjang'])->middleware(['auth']);
Route::get('penjualan/destroypenjualandetail/{id}', [App\Http\Controllers\PenjualanController::class,'destroypenjualandetail'])->middleware(['auth']);
Route::get('penjualan/barang', [App\Http\Controllers\PenjualanController::class,'getDataBarangAll'])->middleware(['auth']);
Route::get('penjualan/jmlbarang', [App\Http\Controllers\PenjualanController::class,'getJumlahBarang'])->middleware(['auth']);
Route::get('penjualan/keranjangjson', [App\Http\Controllers\PenjualanController::class,'keranjangjson'])->middleware(['auth']);
Route::get('penjualan/checkout', [App\Http\Controllers\PenjualanController::class,'checkout'])->middleware(['auth']);
Route::get('penjualan/invoice', [App\Http\Controllers\PenjualanController::class,'invoice'])->middleware(['auth']);
Route::get('penjualan/jmlinvoice', [App\Http\Controllers\PenjualanController::class,'getInvoice'])->middleware(['auth']);
Route::get('penjualan/status', [App\Http\Controllers\PenjualanController::class,'viewstatus'])->middleware(['auth']);
Route::resource('penjualan', PenjualanController::class)->middleware(['auth']);

//grafik
Route::get('grafik/viewPenjualanBlnBerjalan', [App\Http\Controllers\GrafikController::class,'viewPenjualanBlnBerjalan'])->middleware(['auth']);
Route::get('grafik/viewJmlPenjualan', [App\Http\Controllers\GrafikController::class,'viewJmlPenjualan'])->middleware(['auth']);
Route::get('grafik/viewJmlBarangTerjual', [App\Http\Controllers\GrafikController::class,'viewJmlBarangTerjual'])->middleware(['auth']);

// transaksi pembayaran viewkeranjang
Route::get('pembayaran/viewkeranjang', [App\Http\Controllers\PembayaranController::class,'viewkeranjang'])->middleware(['auth']);
Route::get('pembayaran/viewstatus', [App\Http\Controllers\PembayaranController::class,'viewstatus'])->middleware(['auth']); 
Route::get('pembayaran/viewapprovalstatus', [App\Http\Controllers\PembayaranController::class,'viewapprovalstatus'])->middleware(['auth']);
Route::get('pembayaran/approve/{no_transaksi}', [App\Http\Controllers\PembayaranController::class,'approve'])->middleware(['auth']);
Route::get('pembayaran/unapprove/{no_transaksi}', [App\Http\Controllers\PembayaranController::class,'unapprove'])->middleware(['auth']);
Route::get('pembayaran/viewstatusPG', [App\Http\Controllers\PembayaranController::class,'viewstatusPG'])->middleware(['auth']);
Route::resource('pembayaran', PembayaranController::class)->middleware(['auth']);

// untuk berita
Route::get('berita', [App\Http\Controllers\BeritaController::class,'index'])->middleware(['auth']);
Route::get('berita/galeri', [App\Http\Controllers\BeritaController::class,'getNews'])->middleware(['auth']);
Route::get('berita2', [App\Http\Controllers\Berita2Controller::class,'index'])->middleware(['auth']);
Route::get('berita2/galeri', [App\Http\Controllers\Berita2Controller::class,'getNews'])->middleware(['auth']);
Route::get('berita3', [App\Http\Controllers\Berita3Controller::class,'index'])->middleware(['auth']);
Route::get('berita3/galeri', [App\Http\Controllers\Berita3Controller::class,'getNews'])->middleware(['auth']);

// untuk midtrans
Route::get('midtrans', [App\Http\Controllers\CobaMidtransController::class,'index'])->middleware(['auth']);
Route::get('midtrans/status', [App\Http\Controllers\CobaMidtransController::class,'cekstatus2'])->middleware(['auth']);
Route::get('midtrans/status2/{id}', [App\Http\Controllers\CobaMidtransController::class,'cekstatus'])->middleware(['auth']);
Route::get('midtrans/bayar', [App\Http\Controllers\CobaMidtransController::class,'bayar'])->middleware(['auth']);
Route::post('midtrans/proses_bayar', [App\Http\Controllers\CobaMidtransController::class,'proses_bayar'])->middleware(['auth']);

require __DIR__.'/auth.php';
