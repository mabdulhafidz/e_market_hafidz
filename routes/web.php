<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    // Route yang sudah login
 Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
    // Route untuk admin
 Route::group(['middleware' => ['cekUserLogin:1']], function() {
        Route::resource('produk', ProdukController::class);
        Route::get('download/produk', [ProdukController::class, 'download'])->name('export_produk');
    });
    Route::resource('barang', BarangController::class);
    Route::resource('pemasok', PemasokController::class);

    // Route untuk kasir
 Route::group(['middleware' => ['cekUserLogin:2']], function() {
    Route::resource('pembelian', PembelianController::class);
    Route::resource('penjualan', PenjualanController::class);
    });
});

// Users
Route::resource('users', UsersController::class);

// Pelanggan
Route::resource('pelanggan', PelangganController::class);


Route::get('/download', [ProdukController::class, 'download']);

Route::get('/export', [ProdukController::class, 'export']);

Route::post('produk/import', [ProdukController::class, 'import'])->name('import_produk'); 




