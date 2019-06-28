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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('sors', 'SorController');

Route::resource('particips', 'ParticipController');
Route::resource('archives', 'ArchiveController');
Route::resource('editsorties', 'EditSorController');
Route::resource('editusers', 'EditUserController');

Route::resource('usertemps', 'UsertempController');
