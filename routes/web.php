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
    return view('welcome');
});


//verifikasi email user
Auth::routes(['verify' => true]);

Auth::routes();

Route::post('/authentication', 'CekNpmController@ceknpm')->name('authentication');
// Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registrasi', 'RegistrasiController@index')->name('registrasi');
Route::get('/editregistrasi', 'RegistrasiController@editRegistrasi')->name('editregistrasi');
Route::post('/lockRegistrasi', 'RegistrasiController@lockRegistrasi')->name('lockRegistrasi');
Route::post('/createRegistrasi','RegistrasiController@createRegistrasi');


Route::get('/toga', 'TogaController@index')->name('toga');
Route::get('/edittoga', 'TogaController@editToga')->name('edittoga');
Route::post('/lockToga', 'TogaController@lockToga')->name('lockToga');
Route::post('toga', 'TogaController@store')->name('toga.store');
Route::post('toga2', 'TogaController@storeDistrict')->name('toga.storeDistrict');
Route::post('toga3', 'TogaController@storeVillage')->name('toga.storeVillage');
Route::post('/createToga','TogaController@createToga');

Route::get('/persembahan', 'PersembahanController@index')->name('persembahan');

Route::get('/keringanan', 'KeringananController@index')->name('keringanan');
Route::get('/api','XenditController@getBalance');
