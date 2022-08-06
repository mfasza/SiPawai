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
    Route::get('/monitoring', function () {
        return view('kgb.kgb-monitoring');
    })->name('kgb.monitoring');
    Route::get('/kelola', function () {
        return view('kgb.kgb-kelola');
    })->name('kgb.kelola');
});

Route::middleware(['auth'])->prefix('spmt')->group(function () {
    Route::get('/monitoring', function () {
        return view('spmt.spmt-monitoring');
    })->name('spmt.monitoring');
    Route::get('/kelola', function () {
        return view('spmt.spmt-kelola');
    })->name('spmt.kelola');
});

Route::middleware(['auth'])->get('/pegawai', 'PegawaiController@index')->name('pegawai');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
