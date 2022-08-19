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
    Route::get('/kelola/show/{pegawai}', 'DokumenKgbController@show')->name('kgb.show')->middleware('isAdmin');
    Route::post('/generate', 'DokumenKgbController@generate')->name('kgb.generate')->middleware('isAdmin');
    Route::post('/store', 'DokumenKgbController@store')->name('kgb.store')->middleware('isAdmin');
    Route::post('/upload', 'DokumenKgbController@upload')->name('kgb.upload')->middleware('isAdmin');
    Route::delete('/destroy', 'DokumenKgbController@destroy')->name('kgb.destroy')->middleware('isAdmin');
    Route::get('/kelola/showUser/{pegawai}', 'DokumenKgbController@showUser')->name('kgb.show.user');
});

Route::middleware(['auth'])->prefix('spmt')->group(function () {
    Route::get('/monitoring', 'DokumenSpmtController@monitoring')->name('spmt.monitoring');
    Route::get('/kelola', 'DokumenSpmtController@index')->name('spmt.kelola')->middleware('isAdmin');
    Route::get('/kelola/{pegawai}/create', 'DokumenSpmtController@create')->name('spmt.create')->middleware('isAdmin');
    Route::get('/show', 'DokumenSpmtController@show')->name('spmt.show')->middleware('isAdmin');
    Route::post('/generate', 'DokumenSpmtController@generate')->name('spmt.generate')->middleware('isAdmin');
    Route::post('/store', 'DokumenSpmtController@store')->name('spmt.store')->middleware('isAdmin');
    Route::post('/upload', 'DokumenSpmtController@upload')->name('spmt.upload')->middleware('isAdmin');
    Route::delete('/destroy', 'DokumenSpmtController@destroy')->name('spmt.destroy')->middleware('isAdmin');
    Route::get('/showUser', 'DokumenSpmtController@show')->name('spmt.show.user');
});

Route::middleware(['auth', 'isAdmin'])->resource('pegawai', 'PegawaiController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
