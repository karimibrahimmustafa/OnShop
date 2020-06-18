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
    return view('movies.index');
});
Route::get('/index2', 'movieController@index');
Route::get('/movies','movieController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

