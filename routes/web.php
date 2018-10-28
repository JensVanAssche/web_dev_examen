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

Route::get('/', 'AdminController@indexWinners');

Route::get('/meedoen', function () {
    return view('form');
});

Route::post('/meedoen', 'ParticipantsController@store');

Route::resource('/dashboard', 'AdminController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');