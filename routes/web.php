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
    return view('admin/index');
});


Route::get('/admin/barang/index', 'BarangController@index')->name('barangIndex');
Route::get('/admin/barang/show', 'BarangController@show')->name('barangShow');
Route::get('/admin/barang/create', 'BarangController@create')->name('barangCreate');
Route::get('/admin/barang/delete', 'BarangController@destroy')->name('barangDestroy');
Route::get('/admin/barang/edit', 'BarangController@destroy')->name('barangEdit');
Route::get('/admin/barang/edit', 'BarangController@destroy')->name('barangUpdate');
