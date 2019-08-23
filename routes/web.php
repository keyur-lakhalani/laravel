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

/*Route::get('/questions', function () { //example.com/questions
    return view('questions');
});*/
Auth::routes();
Route::resource('questions','questionsController');
Route::get('/home', 'HomeController@index')->name('home');
