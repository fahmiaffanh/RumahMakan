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

Route::get('/', function () {
    return view('dashboard');
})->name("home");

Route::resource('menu','MenuController');
Route::resource('bahan','BahanController');
Route::resource('karyawan','KaryawanController');
Route::resource('pelanggan','PelangganController');
