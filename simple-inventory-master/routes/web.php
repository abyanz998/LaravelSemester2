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
    return view('login');
});

Route::get('/dashboard/welcome', ['as' => 'welcome', 'uses' => 'HomeController@welcome']);

Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index'])              ->middleware('auth');
Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create'])     ->middleware('auth');
Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store'])             ->middleware('auth');
Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit'])      ->middleware('auth');
Route::put('fakultas/edit/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update'])  ->middleware('auth');
Route::get('fakultas/hapus/{id}', ['as' => 'fakultas.hapus', 'uses' => 'FakultasController@hapus'])   ->middleware('auth');

Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index'])                 ->middleware('auth');
Route::get('jurusan/tambah', ['as' => 'jurusan.tambah', 'uses' => 'JurusanController@tambah'])        ->middleware('auth');
Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store'])                ->middleware('auth');
Route::get('jurusan/edit/{id}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit'])         ->middleware('auth');
Route::put('jurusan/edit/{id}', ['as' => 'jurusan.ganti', 'uses' => 'JurusanController@ganti'])       ->middleware('auth');
Route::get('jurusan/delete/{id}', ['as' => 'jurusan.hapus', 'uses' => 'JurusanController@hapus'])     ->middleware('auth');
Route::get('jurusan/export_excel', ['as' => 'jurusan.download', 'uses' => 'JurusanController@export'])->middleware('auth');

Route::get('ruangan', ['as' => 'ruangan.index', 'uses' => 'RuanganController@index'])       ->middleware('auth');
Route::get('ruang/tambah', ['as' => 'ruang.tambah', 'uses' => 'RuanganController@tambah'])  ->middleware('auth');
Route::post('ruang/tambah', ['as' => 'ruang.store', 'uses' => 'RuanganController@store'])   ->middleware('auth');
Route::get('ruang/edit/{id}', ['as' => 'ruang.edit', 'uses' => 'RuanganController@edit'])   ->middleware('auth');
Route::put('ruang/edit/{id}', ['as' => 'ruang.ganti', 'uses' => 'RuanganController@ganti']) ->middleware('auth');
Route::get('ruang/hapus/{id}', ['as' => 'ruang.hapus', 'uses' => 'RuanganController@hapus'])->middleware('auth');

Route::get('barang',                ['as' => 'barang.index',        'uses' => 'BarangController@index'])  ->middleware('auth','role');
Route::get('barang/tambah',         ['as' => 'barang.tambah',       'uses' => 'BarangController@tambah']) ->middleware('auth');
Route::post('barang/tambah',        ['as' => 'barang.store',        'uses' => 'BarangController@store'])  ->middleware('auth');
Route::get('barang/edit/{id}',      ['as' => 'barang.edit',         'uses' => 'BarangController@edit'])   ->middleware('auth');
Route::put('barang/edit/{id}',      ['as' => 'barang.ganti',        'uses' => 'BarangController@ganti'])  ->middleware('auth');
Route::get('barang/hapus/{id}',     ['as' => 'barang.hapus',        'uses' => 'BarangController@hapus'])  ->middleware('auth');
Route::get('barangStaff/staff',     ['as' => 'barang.staff',        'uses' => 'BarangController@staff'])  ->middleware('auth');
Route::get('barang/export_excel',   ['as' => 'barang.download',     'uses' => 'BarangController@export']) ->middleware('auth');
Route::get('barang/upload',         ['as' => 'barang.upload',       'uses' => 'BarangController@upload']) -> middleware('auth');
Route::post('barang/upload/proses', ['as' => 'barang.uploadproses', 'uses' => 'BarangController@uploadproses']) -> middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('kirimemail',            ['as' => 'kirim.kirim',         'uses' => 'kirimController@kirim']);
