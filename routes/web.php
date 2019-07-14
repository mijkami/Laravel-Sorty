<?php
use App\Http\Controllers\ParticipController;

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


Route::get('/', 'ParticipController@index');
Auth::routes();
Route::get('/particips/create2', 'ParticipController@create2');
Route::resource('users', 'UserController');
Route::get('users/{user}/destroy', 'UserController@destroyForm')->name('users.grenade');
Route::resource('sors', 'SorController');
Route::get('sors/{sor}/destroy', 'SorController@destroyForm')->name('sors.grenade');
Route::resource('particips', 'ParticipController');
Route::get('particips/{particip}/destroy', 'ParticipController@destroyForm')->name('particips.grenade');
Route::get('archives', 'ParticipController@archives')->name('particips.archives');
Route::get('send', 'ParticipController@send')->name('send');
Route::get('formemail/{sor}', 'ParticipController@formemail')->name('formemail');

Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView')->name('importExportView');
Route::post('import', 'MyController@import')->name('import');
Route::get('usersindex2', 'MyController@usersindex2');

Route::resource('usertemps', 'UsertempController');

