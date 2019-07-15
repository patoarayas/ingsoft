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
/*
Route::get('type', 'HomeController@type')->name('type');
Route::get('work', 'HomeController@work')->name('work');
Route::get('student','HomeController@student')->name('student');
Route::get('academic','HomeController@academic')->name('academic');

Route::get('Admin\WorkController@cancelwork{id}');
*/

//admin


Route::resource('types','Admin\TypeController');

Route::resource('students','Admin\StudentController');

Route::resource('academics','Admin\AcademicController');

Route::resource('works','Admin\WorkController');
Route::resource('works1','Admin\Work1Controller');
Route::resource('works2','Admin\Work2Controller');
Route::resource('works3','Admin\Work3Controller');

Route::resource('worksAcademics', 'Admin\WorkAcademicsController');

//Route::resource('students/create2','Admin\StudentController');
/*
//ni funcionan xd
Route::get('index2','Admin\StudentController@index2')->name('index2');
Route::get('create2','Admin\StudentController@create2')->name('students.create2');
*/
