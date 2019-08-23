<?php

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

//layanan
Route::get('/layanan', 'LayananController@index');
Route::post('/layanan/create', 'LayananController@create');
Route::get('/layanan/{layanan}/edit', 'LayananController@edit');
Route::post('/layanan/{layanan}/update', 'LayananController@update');
Route::get('/layanan/{layanan}/delete', 'LayananController@delete');

//Karyawan
Route::get('/karyawan', 'KaryawanController@index');
Route::post('/karyawan/create', 'KaryawanController@create');
Route::get('/karyawan/{karyawan}/edit', 'KaryawanController@edit');
Route::post('/karyawan/{karyawan}/update', 'KaryawanController@update');
Route::get('/karyawan/{karyawan}/profile', 'KaryawanController@profile');
Route::get('/karyawan/{karyawan}/delete', 'KaryawanController@delete');
