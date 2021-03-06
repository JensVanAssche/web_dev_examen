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

Route::resource('/meedoen', 'ParticipantsController');

Route::get('/dashboard/excel', 'AdminController@excel')->name('dashboard.excel');

Route::resource('/dashboard', 'AdminController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');