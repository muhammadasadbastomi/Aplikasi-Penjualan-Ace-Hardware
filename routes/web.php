<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now store something great!
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
    Route::post('/admin/barang/master/index', 'BarangController@store')->name('barangStore');
    Route::get('/admin/barang/master/edit', 'BarangController@edit')->name('barangEdit');
    Route::get('/admin/barang/master/edit', 'BarangController@update')->name('barangUpdate');
    Route::get('/admin/barang/master/delete', 'BarangController@delete')->name('barangDelete');

    Route::get('/admin/barang/datang/index', 'BarangdatangController@index')->name('datangIndex');
    Route::get('/admin/barang/datang/index', 'BarangdatangController@store')->name('datangstore');
    Route::get('/admin/barang/datang/show', 'BarangdatangController@show')->name('datangShow');
    Route::get('/admin/barang/datang/edit', 'BarangdatangController@edit')->name('datangEdit');
    Route::get('/admin/barang/datang/edit', 'BarangdatangController@update')->name('datangUpdate');
    Route::get('/admin/barang/datang/delete', 'BarangdatangController@delete')->name('datangDelete');

    Route::get('/admin/barang/pesanan/index', 'BarangpesananController@index')->name('pesananIndex');
    Route::get('/admin/barang/pesanan/index', 'BarangpesananController@store')->name('pesananstore');
    Route::get('/admin/barang/pesanan/show', 'BarangpesananController@show')->name('pesananShow');
    Route::get('/admin/barang/pesanan/edit', 'BarangpesananController@edit')->name('pesananEdit');
    Route::get('/admin/barang/pesanan/edit', 'BarangpesananController@update')->name('pesananUpdate');
    Route::get('/admin/barang/pesanan/delete', 'BarangpesananController@delete')->name('pesananDelete');

    Route::get('/admin/barang/diskon/index', 'BarangdiskonController@index')->name('diskonIndex');
    Route::get('/admin/barang/diskon/index', 'BarangdiskonController@store')->name('diskonstore');
    Route::get('/admin/barang/diskon/show', 'BarangdiskonController@show')->name('diskonShow');
    Route::get('/admin/barang/diskon/edit', 'BarangdiskonController@edit')->name('diskonEdit');
    Route::get('/admin/barang/diskon/edit', 'BarangdiskonController@update')->name('diskonUpdate');
    Route::get('/admin/barang/diskon/delete', 'BarangdiskonController@delete')->name('diskonDelete');

    Route::get('/admin/barang/pengiriman/index', 'BarangpengirimanController@index')->name('pengirimanIndex');
    Route::get('/admin/barang/pengiriman/index', 'BarangpengirimanController@store')->name('pengirimanstore');
    Route::get('/admin/barang/pengiriman/show', 'BarangpengirimanController@show')->name('pengirimanShow');
    Route::get('/admin/barang/pengiriman/edit', 'BarangpengirimanController@edit')->name('pengirimanEdit');
    Route::get('/admin/barang/pengiriman/edit', 'BarangpengirimanController@update')->name('pengirimanUpdate');
    Route::get('/admin/barang/pengiriman/delete', 'BarangpengirimanController@delete')->name('pengirimanDelete');

    Route::get('/admin/barang/terjual/index', 'BarangterjualController@index')->name('terjualIndex');
    Route::get('/admin/barang/terjual/index', 'BarangterjualController@store')->name('terjualstore');
    Route::get('/admin/barang/terjual/show', 'BarangterjualController@show')->name('terjualShow');
    Route::get('/admin/barang/terjual/edit', 'BarangterjualController@edit')->name('terjualEdit');
    Route::get('/admin/barang/terjual/edit', 'BarangterjualController@update')->name('terjualUpdate');
    Route::get('/admin/barang/terjual/delete', 'BarangterjualController@delete')->name('terjualDelete');

    Route::get('/admin/barang/garansi/index', 'BaranggaransiController@index')->name('garansiIndex');
    Route::get('/admin/barang/garansi/index', 'BaranggaransiController@show')->name('garansiShow');
    Route::get('/admin/barang/garansi/store', 'BaranggaransiController@store')->name('garansistore');
    Route::get('/admin/barang/garansi/delete', 'BaranggaransiController@delete')->name('garansiDelete');
    Route::get('/admin/barang/garansi/edit', 'BaranggaransiController@edit')->name('garansiEdit');
    Route::get('/admin/barang/garansi/edit', 'BaranggaransiController@update')->name('garansiUpdate');

    Route::get('/admin/barang/rusak/index', 'BarangrusakController@index')->name('rusakIndex');
    Route::get('/admin/barang/rusak/index', 'BarangrusakController@store')->name('rusakstore');
    Route::get('/admin/barang/rusak/show', 'BarangrusakController@show')->name('rusakShow');
    Route::get('/admin/barang/rusak/edit', 'BarangrusakController@edit')->name('rusakEdit');
    Route::get('/admin/barang/rusak/edit', 'BarangrusakController@update')->name('rusakUpdate');
    Route::get('/admin/barang/rusak/delete', 'BarangrusakController@delete')->name('rusakDelete');

    Route::get('/admin/barang/perbaikan/index', 'BarangperbaikanController@index')->name('perbaikanIndex');
    Route::get('/admin/barang/perbaikan/index', 'BarangperbaikanController@store')->name('perbaikanstore');
    Route::get('/admin/barang/perbaikan/show', 'BarangperbaikanController@show')->name('perbaikanShow');
    Route::get('/admin/barang/perbaikan/edit', 'BarangperbaikanController@edit')->name('perbaikanEdit');
    Route::get('/admin/barang/perbaikan/edit', 'BarangperbaikanController@update')->name('perbaikanUpdate');
    Route::get('/admin/barang/perbaikan/delete', 'BarangperbaikanController@delete')->name('perbaikanDelete');
});

Route::get('/admin/account/index', 'UserController@index')->name('userIndex');
Route::get('/admin/account/setting', 'UserController@edit')->name('userEdit');
Route::get('/admin/account/setting', 'UserController@update')->name('userEdit');
