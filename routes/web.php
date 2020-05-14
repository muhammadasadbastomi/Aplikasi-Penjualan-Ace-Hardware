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
    Route::post('/admin/barang/master/index', 'BarangController@store')->name('barangStore');
    Route::get('/admin/barang/master/show/{id}', 'BarangController@show')->name('barangShow');
    //Route::get('/admin/barang/master/edit', 'BarangController@edit')->name('barangEdit');
    Route::put('/admin/barang/master/show/{id}', 'BarangController@update')->name('barangUpdate');
    Route::delete('/admin/barang/master/delete/{id}', 'BarangController@destroy')->name('barangDelete');

    Route::get('/admin/barang/supplier/index', 'SupplierController@index')->name('supplierIndex');
    Route::post('/admin/barang/supplier/index', 'SupplierController@store')->name('supplierStore');
    Route::get('/admin/barang/supplier/show', 'SupplierController@show')->name('supplierShow');
    // Route::get('/admin/barang/supplier/create', 'BarangController@create')->name('barangCreate');
    Route::get('/admin/barang/supplier/edit/{id}', 'SupplierController@edit')->name('supplierEdit');
    Route::put('/admin/barang/supplier/edit/{id}', 'SupplierController@update')->name('supplierUpdate');
    Route::delete('/admin/barang/supplier/delete/{id}', 'SupplierController@destroy')->name('supplierDestroy');

    Route::get('/admin/barang/stokbarang/index', 'StokController@index')->name('stokIndex');
    //Route::get('/admin/barang/stokbarang/show', 'StokController@show')->name('stokShow');
    // Route::get('/admin/barang/stokbarang/create', 'BarangController@create')->name('barangCreate');
    Route::post('/admin/barang/stokbarang/index', 'StokController@store')->name('stokStore');
    //Route::get('/admin/barang/stokbarang/edit/{id}', 'StokController@edit')->name('stokEdit');
    //Route::put('/admin/barang/stokbarang/edit/{id}', 'StokController@update')->name('stokUpdate');
    Route::delete('/admin/barang/stokbarang/delete/{id}', 'StokController@destroy')->name('stokDestroy');

    Route::get('/admin/barang/datang/index', 'BarangdatangController@index')->name('datangIndex');
    Route::get('/admin/barang/datang/edit/{id}', 'BarangdatangController@edit')->name('datangEdit');
    Route::post('/admin/barang/datang/index', 'BarangdatangController@store')->name('datangstore');
    //Route::get('/admin/barang/datang/show', 'BarangdatangController@show')->name('datangShow');
    Route::put('/admin/barang/datang/edit/{id}', 'BarangdatangController@update')->name('datangUpdate');
    Route::delete('/admin/barang/datang/delete/{id}', 'BarangdatangController@destroy')->name('datangDestroy');

    Route::get('/admin/barang/pesanan/index', 'BarangpesananController@index')->name('pesananIndex');
    Route::post('/admin/barang/pesanan/index', 'BarangpesananController@store')->name('pesananstore');
    Route::get('/admin/barang/pesanan/show', 'BarangpesananController@show')->name('pesananShow');
    Route::get('/admin/barang/pesanan/edit', 'BarangpesananController@edit')->name('pesananEdit');
    Route::post('/admin/barang/pesanan/edit', 'BarangpesananController@update')->name('pesananUpdate');
    Route::delete('/admin/barang/pesanan/delete', 'BarangpesananController@delete')->name('pesananDelete');

    Route::get('/admin/barang/diskon/index', 'BarangdiskonController@index')->name('diskonIndex');
    Route::post('/admin/barang/diskon/index', 'BarangdiskonController@store')->name('diskonstore');
    Route::get('/admin/barang/diskon/show', 'BarangdiskonController@show')->name('diskonShow');
    Route::get('/admin/barang/diskon/edit', 'BarangdiskonController@edit')->name('diskonEdit');
    Route::post('/admin/barang/diskon/edit', 'BarangdiskonController@update')->name('diskonUpdate');
    Route::delete('/admin/barang/diskon/delete', 'BarangdiskonController@delete')->name('diskonDelete');

    Route::get('/admin/barang/pengiriman/index', 'BarangpengirimanController@index')->name('pengirimanIndex');
    Route::post('/admin/barang/pengiriman/index', 'BarangpengirimanController@store')->name('pengirimanstore');
    Route::get('/admin/barang/pengiriman/show', 'BarangpengirimanController@show')->name('pengirimanShow');
    Route::get('/admin/barang/pengiriman/edit', 'BarangpengirimanController@edit')->name('pengirimanEdit');
    Route::post('/admin/barang/pengiriman/edit', 'BarangpengirimanController@update')->name('pengirimanUpdate');
    Route::delete('/admin/barang/pengiriman/delete', 'BarangpengirimanController@delete')->name('pengirimanDelete');

    Route::get('/admin/barang/terjual/index', 'BarangterjualController@index')->name('terjualIndex');
    Route::post('/admin/barang/terjual/index', 'BarangterjualController@store')->name('terjualstore');
    Route::get('/admin/barang/terjual/show', 'BarangterjualController@show')->name('terjualShow');
    Route::get('/admin/barang/terjual/edit', 'BarangterjualController@edit')->name('terjualEdit');
    Route::post('/admin/barang/terjual/edit', 'BarangterjualController@update')->name('terjualUpdate');
    Route::delete('/admin/barang/terjual/delete', 'BarangterjualController@delete')->name('terjualDelete');

    Route::get('/admin/barang/garansi/index', 'BaranggaransiController@index')->name('garansiIndex');
    Route::get('/admin/barang/garansi/store', 'BaranggaransiController@store')->name('garansistore');
    Route::post('/admin/barang/garansi/index', 'BaranggaransiController@show')->name('garansiShow');
    Route::get('/admin/barang/garansi/edit', 'BaranggaransiController@edit')->name('garansiEdit');
    Route::post('/admin/barang/garansi/edit', 'BaranggaransiController@update')->name('garansiUpdate');
    Route::delete('/admin/barang/garansi/delete', 'BaranggaransiController@delete')->name('garansiDelete');

    Route::get('/admin/barang/rusak/index', 'BarangrusakController@index')->name('rusakIndex');
    Route::post('/admin/barang/rusak/index', 'BarangrusakController@store')->name('rusakstore');
    Route::get('/admin/barang/rusak/show', 'BarangrusakController@show')->name('rusakShow');
    Route::get('/admin/barang/rusak/edit', 'BarangrusakController@edit')->name('rusakEdit');
    Route::post('/admin/barang/rusak/edit', 'BarangrusakController@update')->name('rusakUpdate');
    Route::delete('/admin/barang/rusak/delete', 'BarangrusakController@delete')->name('rusakDelete');

    Route::get('/admin/barang/perbaikan/index', 'BarangperbaikanController@index')->name('perbaikanIndex');
    Route::post('/admin/barang/perbaikan/index', 'BarangperbaikanController@store')->name('perbaikanstore');
    Route::get('/admin/barang/perbaikan/show', 'BarangperbaikanController@show')->name('perbaikanShow');
    Route::get('/admin/barang/perbaikan/edit', 'BarangperbaikanController@edit')->name('perbaikanEdit');
    Route::post('/admin/barang/perbaikan/edit', 'BarangperbaikanController@update')->name('perbaikanUpdate');
    Route::delete('/admin/barang/perbaikan/delete', 'BarangperbaikanController@delete')->name('perbaikanDelete');

    Route::get('/admin/account/admin', 'UserController@admin')->name('userAdmin');
    Route::get('/admin/account/karyawan', 'UserController@karyawan')->name('userKaryawan');
    Route::get('/admin/account/setting', 'UserController@edit')->name('userEdit');
    Route::post('/admin/account/setting', 'UserController@update')->name('userUpdate');
});

Route::get('/admin/account/index', 'UserController@index')->name('userIndex');
Route::get('/home/index', 'PenjualanController@index')->name('homeIndex');
Route::get('/home/shop', 'PenjualanController@shop')->name('homeShop');
Route::get('/home/profile', 'PenjualanController@profile')->name('homeProfile');
Route::get('/home/detail', 'PenjualanController@show')->name('homeShow');
