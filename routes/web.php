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


//        Antes eran PageController
Route::get('type', 'HomeController@type')->name('type');
Route::get('work', 'HomeController@work')->name('work');
Route::get('student','HomeController@student')->name('student');

<<<<<<< HEAD
=======
Route::get('Admin\WorkController@cancelwork{id}');

>>>>>>> ad7de24401bb402fb90fd4fb0ce18c3098f56b6c

//admin

Route::resource('types','Admin\TypeController');
Route::resource('works','Admin\WorkController');
Route::resource('students','Admin\StudentController');
<<<<<<< HEAD
=======

//estos los agregue y funcionan (?) nose como pero lo hacen xD
Route::resource('works1','Admin\Work1Controller');
Route::resource('works2','Admin\Work2Controller');
Route::resource('works3','Admin\Work3Controller');

>>>>>>> ad7de24401bb402fb90fd4fb0ce18c3098f56b6c
Route::resource('students/create2','Admin\StudentController');

//ni funcionan xd
Route::get('index2','Admin\StudentController@index2')->name('index2');
Route::get('create2','Admin\StudentController@create2')->name('students.create2');
