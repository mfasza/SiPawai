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

Route::middleware(['auth'])->prefix('kgb')->group(function () {
    Route::get('/monitoring', 'DokumenKgbController@monitoring')->name('kgb.monitoring');
    Route::get('/kelola', 'DokumenKgbController@index')->name('kgb.kelola')->middleware('isAdmin');
    Route::get('/kelola/{pegawai}/create', 'DokumenKgbController@create')->name('kgb.create')->middleware('isAdmin');
    Route::post('/store', 'DokumenKgbController@store')->name('kgb.store')->middleware('isAdmin');
});

Route::middleware(['auth'])->prefix('spmt')->group(function () {
    Route::get('/monitoring', 'DokumenSpmtController@monitoring')->name('spmt.monitoring');
    Route::get('/kelola', 'DokumenSpmtController@index')->name('spmt.kelola')->middleware('isAdmin');
    Route::get('/kelola/{pegawai}/create', 'DokumenSpmtController@create')->name('spmt.create')->middleware('isAdmin');
    Route::post('/generate', 'DokumenSpmtController@generate')->name('spmt.generate')->middleware('isAdmin');
    Route::post('/store', 'DokumenSpmtController@store')->name('spmt.store')->middleware('isAdmin');
});

Route::middleware(['auth', 'isAdmin'])->resource('pegawai', 'PegawaiController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
