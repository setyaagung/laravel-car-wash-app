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

//Login
Route::get('/', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']],function()
{
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

    //Shift
    Route::get('/shift', 'ShiftController@index');
    Route::post('/shift/create', 'ShiftController@create');
    Route::get('/shift/{shift}/edit', 'ShiftController@edit');
    Route::post('/shift/{shift}/update', 'ShiftController@update');
    Route::get('/shift/{shift}/delete', 'ShiftController@delete');

    //User
    Route::get('/user', 'UserController@index');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::post('/user/{user}/update', 'UserController@update');
    Route::get('/user/{user}/delete', 'UserController@delete');

});

Route::group(['middleware' => ['auth', 'checkRole:admin,kasir']],function()
{
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index');
});
