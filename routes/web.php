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

Route::get('/','IndexController@index')->name('vote');
Route::post('/','IndexController@store')->name('vote.store');
/*Route::get('/questions', function () { //example.com/questions
    return view('questions');
});*/
Auth::routes();
Route::resource('questions','questionsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('choice/{question}', 'ChoiceController@index')
		->name('choice.index');
Route::post('choice/{question}', 'ChoiceController@store')
		->name('choice.store');
Route::get('choice/create/{question}','ChoiceController@create')
		->name('choice.create');
Route::delete('choice/{choice}', 'ChoiceController@destroy')
		->name('choice.destroy');		
Route::get('choice/{choice}/edit', 'ChoiceController@edit')
		->name('choice.edit');
Route::put('choice/{choice}', 'ChoiceController@update')
		->name('choice.update');

