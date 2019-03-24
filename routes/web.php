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

Route::get('/', 'HomeController@index');

// Route::post('/getcites/{country_id}','HomeController@getcites')->name('getCites');

Route::post('/getcites','HomeController@getcites')->name('getCites');

Route::post('/register', 'UserController@store');
Route::get('refresh_captcha', 'UserController@refreshCaptcha')->name('refresh_captcha');
