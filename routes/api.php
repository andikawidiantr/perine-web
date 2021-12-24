<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/loginAndroid', 'AnggotaController@loginAndroid');

//anggota
Route::post('/registrasi', 'AnggotaController@registrasi');

Route::get('/showpinjem/{id}','AnggotaController@showpinjem');

Route::post('/createtransaksi', 'AnggotaController@createtransaksi');

Route::post('/editprofile/{id}','AnggotaController@updateprofile');



//admin
Route::get('/buku','AdminController@index');

Route::post('/createbuku','AdminController@createbuku');

Route::post('/editbuku/{id}','AdminController@updatebuku');

Route::get('/deletebuku/{id}','AdminController@deletebuku');

Route::get('/history','AdminController@history');

Route::get('/gantistatus/{id}','AdminController@gantistatus');

// ifen
Route::get('/showanggota','AdminController@showanggota');

Route::get('/deleteanggota/{id}','AdminController@deleteanggota');

Route::get('/anggota','AdminController@indexanggota');

Route::get('/admin','AdminController@indexadmin');

Route::post('/createadmin','AdminController@createadmin');

Route::post('/editadmin/{id}','AdminController@updateadmin');
