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
    return view('web/login'); //llamado a la plantilla principal, login de la carpeta web
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
