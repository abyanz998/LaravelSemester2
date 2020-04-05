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
    return view('fakultas.index');
});

Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create']);
Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store']);
Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit']);
Route::put('fakultas/edit/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update']);
Route::get('fakultas/hapus/{id}', ['as' => 'fakultas.hapus', 'uses' => 'FakultasController@hapus']);

Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
Route::get('jurusan/tambah', ['as' => 'jurusan.tambah', 'uses' => 'JurusanController@tambah']);
Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store']);
Route::get('jurusan/edit/{id}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit']);
Route::put('jurusan/edit/{id}', ['as' => 'jurusan.ganti', 'uses' => 'JurusanController@ganti']);
Route::get('jurusan/delete/{id}', ['as' => 'jurusan.hapus', 'uses' => 'JurusanController@hapus']);
