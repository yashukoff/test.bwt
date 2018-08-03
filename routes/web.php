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

Route::get('/feedback', function () {
    return view('feedback_form');
});

Route::get('/feedback-success', function () {
    return view('feedback_success');
});

Route::post('/feedback', 'MainController@addFeedback');

Route::get('/weather', 'HomeController@getWeather');

Route::get('/feedback-list', 'HomeController@getFeedbackList');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
