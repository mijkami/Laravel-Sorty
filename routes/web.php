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
Auth::routes(['register' => false]);
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
Route::get('export', 'ExcelIOController@export')->name('export');
Route::get('importExport', 'ExcelIOController@importExportView')->name('importExportView');
Route::post('import', 'ExcelIOController@import')->name('import');
Route::get('modif', 'UserController@massEdit')->name('modif');
Route::resource('usertemps', 'UsertempController');

