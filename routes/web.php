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

// Register, Login, dan Logout
Auth::routes();

// Guest
// Menampilkan Daftar Kelas yang Dibuka
Route::get('/', 'GuestController@kelasBuka');
Route::get('/detailkelas/{id}', 'GuestController@infoKelas');

// Siswa
Route::group(['middleware' => ['siswa']], function () {
    // Kelas Terdaftars
    Route::get('/kelasdaftar', 'SiswaController@kelasDaftar');
    // Daftar Kelas
    Route::get('/daftarkelas/{id}', 'SiswaController@daftarKelas');
    Route::post('/daftarkelas/{id}', 'SiswaController@daftarKelasPost');
});

// Admin
Route::group(['middleware' => ['admin']], function () {
    // List Kelas
    Route::get('/listkelas', 'AdminController@listKelas');
    // Tambah Kelas
    Route::get('/tambahkelas', 'AdminController@tambahKelas')->name('kelas.create');
    Route::post('/tambahkelas', 'AdminController@tambahKelasPost');
    // Update Kelas
    Route::get('/updatekelas/{id}', 'AdminController@updateKelas');
    Route::put('/updatekelas/{id}', 'AdminController@updateKelasPut');
});
