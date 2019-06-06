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
Route::get('type', 'Web\PageController@type')->name('type');
Route::get('work', 'Web\PageController@work')->name('work');

//admin
Route::resource('types','Admin\TypeController');
Route::resource('works','Admin\WorkController');
