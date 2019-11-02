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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions','QuestionController')->except('show');
Route::get('/questions/{slug}','QuestionController@show')->name('questions.show');

Route::resource('questions.answers','AnswerController')->except(['index','create','show']);
Route::post('/answers/{answer}/accept','AcceptAnswerController')->name('answers.accept');
//Route::post('/questions/{question}/answers','AnswerController@store')->name('answers.store');

Route::post('/questions/{question}/favorites','FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites','FavoritesController@destroy')->name('questions.unfavorite');

Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');
