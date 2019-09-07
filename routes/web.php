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

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
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
    Route::post('/karyawan/{id}/addtanggungan', 'KaryawanController@addtanggungan');
    Route::post('/karyawan/{id}/addabsensi', 'KaryawanController@addabsensi');
    Route::get('/karyawan/{karyawan}/delete', 'KaryawanController@delete');

    //Supplier
    Route::get('/supplier', 'SupplierController@index');
    Route::post('/supplier/create', 'SupplierController@create');
    Route::get('/supplier/{supplier}/edit', 'SupplierController@edit');
    Route::post('/supplier/{supplier}/update', 'SupplierController@update');
    Route::get('/supplier/{supplier}/delete', 'SupplierController@delete');

    //Shift
    Route::get('/shift', 'ShiftController@index');
    Route::post('/shift/create', 'ShiftController@create');
    Route::get('/shift/{shift}/edit', 'ShiftController@edit');
    Route::post('/shift/{shift}/update', 'ShiftController@update');
    Route::get('/shift/{shift}/delete', 'ShiftController@delete');

    //Tagihan
    Route::get('/tagihan', 'TagihanController@index');
    Route::post('/tagihan/create', 'TagihanController@create');
    Route::get('/tagihan/{tagihan}/edit', 'TagihanController@edit');
    Route::post('/tagihan/{tagihan}/update', 'TagihanController@update');
    Route::get('/tagihan/{tagihan}/delete', 'TagihanController@delete');

    //laporan
    Route::resource('/laporan_kas_masuk', 'LaporanKasMasukController');
    Route::resource('/laporan_kas_keluar', 'LaporanKasKeluarController');
    Route::get('/cari-laporan-km', 'LaporanKasMasukController@cari');
    Route::get('/pdf-km/{dari}/{sampai}/{shift_id}', 'LaporanKasMasukController@pdf');
    Route::get('/cari-laporan-kk', 'LaporanKasKeluarController@cari');
    Route::get('/pdf-kk/{dari}/{sampai}/{tagihan_id}', 'LaporanKasKeluarController@pdf');

    //User
    Route::get('/user', 'UserController@index');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::post('/user/{user}/update', 'UserController@update');
    Route::get('/user/{user}/delete', 'UserController@delete');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,kasir']], function () {
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('/kas_masuk', 'KasMasukController');
    Route::resource('/kas_keluar', 'KasKeluarController');
    Route::get('/penjualan/save', 'PenjualanController@save')->name('penjualan.save');
    Route::resource('/penjualan', 'PenjualanController');
    Route::get('/ganti-password', 'GantiPasswordController@index')->name('ganti-password.index');
    Route::post('/ganti-password', 'GantiPasswordController@gantiPassword')->name('ganti-password.update');
});
