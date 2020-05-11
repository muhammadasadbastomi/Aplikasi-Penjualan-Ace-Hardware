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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'CheckRole:1']], function () {
    Route::get('/admin/index', 'HomeController@index')->name('adminIndex');

    Route::get('/admin/barang/master/index', 'BarangController@index')->name('barangIndex');
    Route::get('/admin/barang/mastter/show', 'BarangController@show')->name('barangShow');
    Route::get('/admin/barang/master/create', 'BarangController@create')->name('barangCreate');
    Route::post('/admin/barang/master/store', 'BarangController@store')->name('barangStore');
    Route::get('/admin/barang/master/delete', 'BarangController@destroy')->name('barangDestroy');
    Route::get('/admin/barang/master/edit', 'BarangController@destroy')->name('barangEdit');
    Route::get('/admin/barang/master/edit', 'BarangController@destroy')->name('barangUpdate');

    Route::get('/admin/barang/datang/index', 'BarangdatangController@index')->name('datangIndex');
    Route::get('/admin/barang/datang/show', 'BarangdatangController@show')->name('datangShow');
    Route::get('/admin/barang/datang/create', 'BarangdatangController@create')->name('datangCreate');
    Route::get('/admin/barang/datang/delete', 'BarangdatangController@destroy')->name('datangDestroy');
    Route::get('/admin/barang/datang/edit', 'BarangdatangController@destroy')->name('datangEdit');
    Route::get('/admin/barang/datang/edit', 'BarangdatangController@destroy')->name('datangUpdate');

    Route::get('/admin/barang/pesanan/index', 'BarangpesananController@index')->name('pesananIndex');
    Route::get('/admin/barang/pesanan/show', 'BarangpesananController@show')->name('pesananShow');
    Route::get('/admin/barang/pesanan/create', 'BarangpesananController@create')->name('pesananCreate');
    Route::get('/admin/barang/pesanan/delete', 'BarangpesananController@destroy')->name('pesananDestroy');
    Route::get('/admin/barang/pesanan/edit', 'BarangpesananController@destroy')->name('pesananEdit');
    Route::get('/admin/barang/pesanan/edit', 'BarangpesananController@destroy')->name('pesananUpdate');

    Route::get('/admin/barang/diskon/index', 'BarangdiskonController@index')->name('diskonIndex');
    Route::get('/admin/barang/diskon/show', 'BarangdiskonController@show')->name('diskonShow');
    Route::get('/admin/barang/diskon/create', 'BarangdiskonController@create')->name('diskonCreate');
    Route::get('/admin/barang/diskon/delete', 'BarangdiskonController@destroy')->name('diskonDestroy');
    Route::get('/admin/barang/diskon/edit', 'BarangdiskonController@destroy')->name('diskonEdit');
    Route::get('/admin/barang/diskon/edit', 'BarangdiskonController@destroy')->name('diskonUpdate');

    Route::get('/admin/barang/pengiriman/index', 'BarangpengirimanController@index')->name('pengirimanIndex');
    Route::get('/admin/barang/pengiriman/show', 'BarangpengirimanController@show')->name('pengirimanShow');
    Route::get('/admin/barang/pengiriman/create', 'BarangpengirimanController@create')->name('pengirimanCreate');
    Route::get('/admin/barang/pengiriman/delete', 'BarangpengirimanController@destroy')->name('pengirimanDestroy');
    Route::get('/admin/barang/pengiriman/edit', 'BarangpengirimanController@destroy')->name('pengirimanEdit');
    Route::get('/admin/barang/pengiriman/edit', 'BarangpengirimanController@destroy')->name('pengirimanUpdate');

    Route::get('/admin/barang/terjual/index', 'BarangterjualController@index')->name('terjualIndex');
    Route::get('/admin/barang/terjual/show', 'BarangterjualController@show')->name('terjualShow');
    Route::get('/admin/barang/terjual/create', 'BarangterjualController@create')->name('terjualCreate');
    Route::get('/admin/barang/terjual/delete', 'BarangterjualController@destroy')->name('terjualDestroy');
    Route::get('/admin/barang/terjual/edit', 'BarangterjualController@destroy')->name('terjualEdit');
    Route::get('/admin/barang/terjual/edit', 'BarangterjualController@destroy')->name('terjualUpdate');

    Route::get('/admin/barang/garansi/index', 'BaranggaransiController@index')->name('garansiIndex');
    Route::get('/admin/barang/garansi/show', 'BaranggaransiController@show')->name('garansiShow');
    Route::get('/admin/barang/garansi/create', 'BaranggaransiController@create')->name('garansiCreate');
    Route::get('/admin/barang/garansi/delete', 'BaranggaransiController@destroy')->name('garansiDestroy');
    Route::get('/admin/barang/garansi/edit', 'BaranggaransiController@destroy')->name('garansiEdit');
    Route::get('/admin/barang/garansi/edit', 'BaranggaransiController@destroy')->name('garansiUpdate');

    Route::get('/admin/barang/rusak/index', 'BarangrusakController@index')->name('rusakIndex');
    Route::get('/admin/barang/rusak/show', 'BarangrusakController@show')->name('rusakShow');
    Route::get('/admin/barang/rusak/create', 'BarangrusakController@create')->name('rusakCreate');
    Route::get('/admin/barang/rusak/delete', 'BarangrusakController@destroy')->name('rusakDestroy');
    Route::get('/admin/barang/rusak/edit', 'BarangrusakController@destroy')->name('rusakEdit');
    Route::get('/admin/barang/rusak/edit', 'BarangrusakController@destroy')->name('rusakUpdate');

    Route::get('/admin/barang/perbaikan/index', 'BarangperbaikanController@index')->name('perbaikanIndex');
    Route::get('/admin/barang/perbaikan/show', 'BarangperbaikanController@show')->name('perbaikanShow');
    Route::get('/admin/barang/perbaikan/create', 'BarangperbaikanController@create')->name('perbaikanCreate');
    Route::get('/admin/barang/perbaikan/delete', 'BarangperbaikanController@destroy')->name('perbaikanDestroy');
    Route::get('/admin/barang/perbaikan/edit', 'BarangperbaikanController@destroy')->name('perbaikanEdit');
    Route::get('/admin/barang/perbaikan/edit', 'BarangperbaikanController@destroy')->name('perbaikanUpdate');
});
