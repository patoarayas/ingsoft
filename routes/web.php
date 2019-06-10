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
    //Llama a la vista del login, en views/auth/login
    return view('auth/login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// TODO:: ¿A donde apuntas estas rutas, donde son usadas?
//        Antes eran PageController
Route::get('type', 'HomeController@type')->name('type');
Route::get('work', 'HomeController@work')->name('work');

//admin

Route::resource('types','Admin\TypeController');
Route::resource('works','Admin\WorkController');
