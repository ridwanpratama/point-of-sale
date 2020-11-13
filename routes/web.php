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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('user.login');
})->name('login');

Route::post('postlogin', 'LoginController@login')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('merek', 'MerekController@index')->name('merek');
    Route::get('create_merek', 'MerekController@create')->name('create_merek');
    Route::post('simpan_merek', 'MerekController@store')->name('simpan_merek');
    Route::get('edit_merek/{id}', 'MerekController@edit')->name('edit_merek');
    Route::post('update_merek/{id}', 'MerekController@update')->name('update_merek');
    Route::get('delete_merek/{id}', 'MerekController@destroy')->name('delete_merek');

    Route::get('distributor', 'DistributorController@index')->name('distributor');
    Route::get('create_distributor', 'DistributorController@create')->name('create_distributor');
    Route::post('simpan_distributor', 'DistributorController@store')->name('simpan_distributor');
    Route::get('edit_distributor/{id}', 'DistributorController@edit')->name('edit_distributor');
    Route::post('update_distributor/{id}', 'DistributorController@update')->name('update_distributor');
    Route::get('delete_distributor/{id}', 'DistributorController@destroy')->name('delete_distributor');

    Route::get('barang', 'BarangController@index')->name('barang');
    Route::get('create_barang', 'BarangController@create')->name('create_barang');
    Route::post('simpan_barang', 'BarangController@store')->name('simpan_barang');
    Route::get('edit_barang/{id}', 'BarangController@edit')->name('edit_barang');
    Route::post('update_barang/{id}', 'BarangController@update')->name('update_barang');
    Route::get('delete_barang/{id}', 'BarangController@destroy')->name('delete_barang');
});

Route::group(['middleware' => ['auth', 'ceklevel:kasir']], function () {
    Route::get('transaksi', 'TransaksiController@create')->name('transaksi');
    Route::get('index_transaksi', 'TransaksiController@index')->name('index_transaksi');
    Route::post('simpan_transaksi', 'TransaksiController@store')->name('simpan_transaksi');
    Route::get('delete_transaksi/{id}', 'TransaksiController@destroy')->name('delete_transaksi');
});

Route::group(['middleware' => ['auth', 'ceklevel:manager']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('create_user', 'UserController@create')->name('create_user');
    Route::post('simpan_user', 'UserController@store')->name('simpan_user');
    Route::get('edit_user/{id}', 'UserController@edit')->name('edit_user');
    Route::post('update_user/{id}', 'UserController@update')->name('update_user');
    Route::get('delete_user/{id}', 'UserController@destroy')->name('delete_user');
    Route::get('laporan', 'LaporanController@index')->name('laporan');
    Route::get('laporan_barang', 'LaporanController@barang')->name('laporan_barang');
    Route::get('/laporan/cari', 'LaporanController@cari');
    Route::get('/laporan/search', 'LaporanController@search');
});
