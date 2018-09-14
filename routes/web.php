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

//Route::get('/tt','StaticPagesController@tt')->name('tt');
Route::get('/tt/{token}','UsersController@tt')->name('tt');

Route::get('/','StaticPagesController@index')->name('home');
Route::get('help','StaticPagesController@help')->name('help');
Route::get('about','StaticPagesController@about')->name('about');

//Route::get('signup','UsersController@create')->name('signup');
Route::resource('users','UsersController');
Route::get('users/create/confirm/{token}','UsersController@confirmEmailToActivate')->name('activate_account');
//Route::get('confirm/{token}','UsersController@confirmEmailToActivate')->name('activate_account');


Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');




