<?php

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

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
Route::post('postlogin', ['as' => 'post.login', 'uses' => 'LoginController@post']);

Route::group(['middleware' => ['auth', 'checkRole:superadmin,Admin']], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', ['as' => 'back.dashboard', 'uses' => 'BackDashboardController@index']);
        Route::get('dashboard', ['as' => 'back.dashboard', 'uses' => 'BackDashboardController@index']);

        Route::prefix('barang')->group(function () {
            Route::get('/', ['as' => 'barang', 'uses' => 'BarangController@index']);
            Route::get('add', ['as' => 'barang.add', 'uses' => 'BarangController@add']);
            Route::post('store', ['as' => 'barang.store', 'uses' => 'BarangController@store']);
            Route::get('destroy', ['as' => 'barang.destroy', 'uses' => 'BarangController@destroy']);
            Route::get('edit/{id}', ['as' => 'barang.edit', 'uses' => 'BarangController@edit']);
            Route::post('update/{id}', ['as' => 'barang.update', 'uses' => 'BarangController@update']);
        });

        Route::prefix('penjualan')->group(function(){
            Route::get('/',['as' => 'penjualan','uses' => 'PenjualanController@index']);
            Route::get('tambah',['as' => 'penjualan.add','uses' => 'PenjualanController@add']);
            Route::post('store',['as' => 'penjualan.store','uses' => 'PenjualanController@store']);
            Route::get('renderTabel',['as' => 'penjualan.rendertabel','uses' => 'PenjualanController@renderTabel']);
            Route::get('addTemp',['as' => 'penjualan.addtemp','uses' => 'PenjualanController@addToTemp']);
            Route::get('editTemp',['as' => 'penjualan.edittemp','uses' => 'PenjualanController@editTemp']);
            Route::get('updateTemp',['as' => 'penjualan.updatetemp','uses' => 'PenjualanController@updateTemp']);
            Route::get('deleteTemp',['as' => 'penjualan.deletetemp','uses' => 'PenjualanController@deleteTemp']);
            Route::get('jmlbarangtemp',['as' => 'penjualan.jmlbarangtemp','uses' => 'PenjualanController@jmlBarangTemp']);
            Route::get('lihatfaktur',['as' => 'penjualan.lihatfaktur','uses' => 'PenjualanController@lihatFaktur']);
            Route::get('cektakFaktur/{kode}',['as' => 'penjualan.cetak.faktur','uses' => 'PenjualanController@cetakFaktur']);
            Route::get('destroy', ['as' => 'penjualan.destroy', 'uses' => 'PenjualanController@destroy']);

        });

        Route::prefix('pelanggan')->group(function () {
            Route::get('/', ['as' => 'pelanggan', 'uses' => 'PelangganController@index']);
            Route::get('add', ['as' => 'pelanggan.add', 'uses' => 'PelangganController@add']);
            Route::post('store', ['as' => 'pelanggan.store', 'uses' => 'PelangganController@store']);
            Route::get('destroy', ['as' => 'pelanggan.destroy', 'uses' => 'PelangganController@destroy']);
            Route::get('edit/{id}', ['as' => 'pelanggan.edit', 'uses' => 'PelangganController@edit']);
            Route::post('update/{id}', ['as' => 'pelanggan.update', 'uses' => 'PelangganController@update']);
        });

        Route::prefix('pph/{tahun}')->group(function () {
            Route::get('/', ['as' => 'pajak', 'uses' => 'PajakController@index']);
            // Route::post('store', ['as' => 'pelanggan.store', 'uses' => 'PelangganController@store']);
            // Route::get('destroy', ['as' => 'pelanggan.destroy', 'uses' => 'PelangganController@destroy']);
            // Route::get('edit/{id}', ['as' => 'pelanggan.edit', 'uses' => 'PelangganController@edit']);
            // Route::post('update/{id}', ['as' => 'pelanggan.update', 'uses' => 'PelangganController@update']);
        });

        Route::prefix('laporan')->group(function () {
            Route::get('penjualan', ['as' => 'laporan.penjualan', 'uses' => 'LaporanController@indexPenjualan']);
            Route::get('penjualan/cetak', ['as' => 'laporan.penjualan.cetak', 'uses' => 'LaporanController@cetakPenjualan']);
            Route::get('pph', ['as' => 'laporan.pph', 'uses' => 'LaporanController@indexPPH']);
            Route::get('pph/cetak', ['as' => 'laporan.pph.cetak', 'uses' => 'LaporanController@cetakPPH']);
        });
    });
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,Admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', ['as' => 'back.user', 'uses' => 'UserController@index']);
            Route::get('add', ['as' => 'back.user.add', 'uses' => 'UserController@add']);
            Route::post('store', ['as' => 'back.user.store', 'uses' => 'UserController@store']);
            Route::get('destroy', ['as' => 'back.user.destroy', 'uses' => 'UserController@destroy']);
            Route::get('edit/{id}', ['as' => 'back.user.edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'back.user.update', 'uses' => 'UserController@update']);
        });
    });
});
