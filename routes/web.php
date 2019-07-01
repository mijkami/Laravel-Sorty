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
    return view('pages.planning ');
});

Auth::routes();

Route::resource('users', 'UserController');
Route::get('users/{user}/destroy', 'UserController@destroyForm')->name('users.grenade');
Route::resource('sors', 'SorController');
Route::get('sors/{sor}/destroy', 'SorController@destroyForm')->name('sors.grenade');
Route::resource('particips', 'ParticipController');
Route::get('/particips/create2', 'ParticipController@create2');
Route::resource('usertemps', 'UsertempController');

