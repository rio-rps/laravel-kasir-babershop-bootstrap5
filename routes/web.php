<?php

use App\Http\Controllers\BarangJasaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SatuanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); 



Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
//Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('beranda', [BerandaController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {

        //Route::get('satuan/{id}/edit');

        // Route::resource('kategori', KategoriController::class);


        //  Route::resource('satuan/destroy', SatuanController::class); // delete
        // Route::resource('/satuan/formadd', SatuanController::class);
        // Route::get('satuan/formadd', [SatuanController::class, 'formadd'])->name('formadd');
        // Route::get('satuan/formadd', 'formadd');
        // Route::resource('formadd', SatuanController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('satuan', SatuanController::class);
        Route::resource('barangjasa', BarangJasaController::class)->parameters([
            'barangjasa' => 'kat',
        ]);
        Route::get('harga/formedit', [HargaController::class, 'formedit'])->name('harga.formedit');
        Route::put('harga/update/{id}', [HargaController::class, 'update'])->name('harga.update');
        //Route::resource('harga', SatuanController::class);
        // Route::resource('barangjasa.create', BarangJasaController::class)->parameters([
        //     'kategori' => 'kategori',
        // ]);

        //Route::resource('satuan/store', SatuanController::class); // save

        // Route::resource('penjualan', PenjualanController::class);
        // Route::resource('kategori', PenjualanController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        //Route::resource('kasir', Kasir::class);
        //Route::resource('pembelian', PembelianController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:4']], function () {
        //Route::resource('kasir', Kasir::class);
        //Route::resource('laporan', LaporanController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:5']], function () {
        //Route::resource('kasir', Kasir::class);
        //Route::resource('laporan', LaporanController::class);
    });
});
