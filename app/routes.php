<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/','WebController@index');
Route::get('web/kategori/{id}','WebController@kategori');


Route::resource('kategori','KategoriController');
Route::post('kategori/hapus','KategoriController@hapus');

Route::resource('lokasi','LokasiController');
Route::post('lokasi/hapus','LokasiController@hapus');