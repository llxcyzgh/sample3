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

use Illuminate\Support\Facades\Route;


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

// 关于密码重设部分
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');// 显示重设密码请求页面
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');// 执行发送要重设密码的邮箱动作
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');// 显示重设密码页面
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');// 执行重设密码动作

Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);




Route::resource('yxs','YxsController',['only'=>['index','store','destroy']]);
//Route::get('yxs','YxsController@index')->name('yxs');
//Route::post('yxs','YxsController@store')->name('yxs.store');
//Route::get('yxs/{yx}','YxsController@destroy')->name('yxs.destroy');




