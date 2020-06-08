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

Auth::routes();

Route::group(['middleware' => ['auth', 'CheckRole:1,2']], function () {
    Route::get('/admin', 'HomeController@index')->name('adminIndex');

    Route::patch('/admin/thumbnail/index', 'ThumbController@update')->name('thumbUpdate');
    Route::get('/admin/thumbnail/index', 'ThumbController@index')->name('thumbIndex');
    Route::post('/admin/thumbnail/index', 'ThumbController@store')->name('thumbStore');
    Route::get('/admin/thumbnail/show/{id}', 'ThumbController@show')->name('thumbShow');
    Route::get('/admin/thumbnail/edit', 'ThumbController@edit')->name('thumbEdit');
    Route::delete('/admin/thumbnail/delete/{id}', 'ThumbController@delete')->name('thumbDelete');

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

    Route::get('/admin/barang/datang/index', 'BarangdatangController@index')->name('datangIndex');
    Route::get('/admin/barang/datang/edit/{id}', 'BarangdatangController@edit')->name('datangEdit');
    Route::post('/admin/barang/datang/index', 'BarangdatangController@store')->name('datangstore');
    //Route::get('/admin/barang/datang/show', 'BarangdatangController@show')->name('datangShow');
    Route::put('/admin/barang/datang/edit/{id}', 'BarangdatangController@update')->name('datangUpdate');
    Route::delete('/admin/barang/datang/delete/{id}', 'BarangdatangController@destroy')->name('datangDestroy');

    Route::get('/admin/barang/rusak/index', 'BarangrusakController@index')->name('rusakIndex');
    Route::post('/admin/barang/rusak/index', 'BarangrusakController@store')->name('rusakstore');
    //Route::get('/admin/barang/rusak/show', 'BarangrusakController@show')->name('rusakShow');
    Route::get('/admin/barang/rusak/edit/{id}', 'BarangrusakController@edit')->name('rusakEdit');
    Route::put('/admin/barang/rusak/edit/{id}', 'BarangrusakController@update')->name('rusakUpdate');
    Route::delete('/admin/barang/rusak/delete/{id}', 'BarangrusakController@destroy')->name('rusakDelete');

    Route::get('/admin/barang/pengiriman/index', 'BarangpengirimanController@index')->name('pengirimanIndex');
    Route::post('/admin/barang/pengiriman/index', 'BarangpengirimanController@store')->name('pengirimanstore');
    //Route::get('/admin/barang/pengiriman/show', 'BarangpengirimanController@show')->name('pengirimanShow');
    Route::get('/admin/barang/pengiriman/edit/{id}', 'BarangpengirimanController@edit')->name('pengirimanEdit');
    Route::put('/admin/barang/pengiriman/edit/{id}', 'BarangpengirimanController@update')->name('pengirimanUpdate');
    Route::delete('/admin/barang/pengiriman/delete/{id}', 'BarangpengirimanController@destroy')->name('pengirimanDelete');

    Route::get('/admin/barang/terjual/index', 'BarangterjualController@index')->name('terjualIndex');
    Route::post('/admin/barang/terjual/index', 'BarangterjualController@store')->name('terjualstore');
    //Route::get('/admin/barang/terjual/show', 'BarangterjualController@show')->name('terjualShow');
    Route::get('/admin/barang/terjual/edit/{id}', 'BarangterjualController@edit')->name('terjualEdit');
    Route::put('/admin/barang/terjual/edit/{id}', 'BarangterjualController@update')->name('terjualUpdate');
    Route::delete('/admin/barang/terjual/delete/{id}', 'BarangterjualController@destroy')->name('terjualDelete');

    Route::get('/admin/barang/garansi/index', 'BaranggaransiController@index')->name('garansiIndex');
    Route::post('/admin/barang/garansi/index', 'BaranggaransiController@store')->name('garansiStore');
    //Route::post('/admin/barang/garansi/index', 'BaranggaransiController@show')->name('garansiShow');
    Route::get('/admin/barang/garansi/edit/{id}', 'BaranggaransiController@edit')->name('garansiEdit');
    Route::put('/admin/barang/garansi/edit/{id}', 'BaranggaransiController@update')->name('garansiUpdate');
    Route::delete('/admin/barang/garansi/delete/{id}', 'BaranggaransiController@destroy')->name('garansiDelete');

    Route::get('/admin/account/admin', 'UserController@admin')->name('userAdmin');
    Route::get('/admin/account/edit/{id}', 'UserController@adminedit')->name('adminEdit');
    Route::get('/admin/account/karyawan', 'UserController@karyawan')->name('userKaryawan');
    Route::get('/admin/account/setting/', 'UserController@edit')->name('userEdit');
    Route::post('/admin/account/setting/', 'UserController@update')->name('userUpdate');

    Route::get('/admin/supplier/cetak', 'CetakController@supplier')->name('supplierCetak');
    Route::get('/admin/barang/cetak', 'CetakController@barang')->name('barangCetak');
    Route::get('/admin/datang/cetak', 'CetakController@datang')->name('datangCetak');
    Route::get('/admin/diskon/cetak', 'CetakController@diskon')->name('diskonCetak');
    Route::get('/admin/pengiriman/cetak', 'CetakController@pengiriman')->name('pengirimanCetak');
    Route::get('/admin/terkirim/cetak', 'CetakController@terkirim')->name('terkirimCetak');
    Route::get('/admin/terjual/cetak', 'CetakController@terjual')->name('terjualCetak');
    Route::get('/admin/garansi/cetak', 'CetakController@garansi')->name('garansiCetak');
    Route::get('/admin/rusak/cetak', 'CetakController@rusak')->name('rusakCetak');
    Route::get('/admin/SelesaiPerbaikan/cetak', 'CetakController@perbaikan1')->name('perbaikan1Cetak');
    Route::get('/admin/TidakBisaPerbaikan/cetak', 'CetakController@perbaikan2')->name('perbaikan2Cetak');
});

Route::group(['middleware' => ['auth', 'CheckRole:1']], function () {

    Route::get('/admin/account/admin', 'UserController@admin')->name('userAdmin');
    Route::post('/admin/account/admin', 'UserController@Store')->name('userAdmintore');

    Route::get('/admin/account/edit', 'UserController@adminedit')->name('adminEdit');
    Route::get('/admin/account/karyawan', 'UserController@karyawan')->name('userKaryawan');
    Route::post('/admin/account/karyawan', 'UserController@create')->name('userKaryawanStore');
    Route::delete('/admin/account/karyawan/delete/{id}', 'UserController@destroy')->name('userKaryawanDelete');
});

Route::get('/', 'PenjualanController@index')->name('homeIndex');
Route::get('/home/shop', 'PenjualanController@shop')->name('homeShop');
Route::get('/home/profile/', 'PenjualanController@profile')->name('homeProfile');
Route::get('/home/detail/{id}', 'PenjualanController@show')->name('homeShow');
