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

Route::get('/' , 'LoginController@index')->name('login_form');
Route::get('login' , 'LoginController@index')->name('login');

Route::post('login','LoginController@validateUserEmail')->name('validate_User_Email');

Route::get('signup','SignupController@index')->name('signup_form');
Route::post('signup','SignupController@validateRequest')->name('validate_request');

Route::get('dashboard','DashboardController@index')->name('dashboard')->middleware('myownauth');
Route::get('logout','DashboardController@logout')->name('logout');

Route::get('users_profile','UsersProfileController@index')->name('users_profile')->middleware('myownauth');
Route::get('edit','UsersProfileController@edit')->name('edit_user')->middleware('myownauth');
Route::get('delete', 'UsersProfileController@delete')->name('delete_user')->middleware('myownauth');
Route::post('validateEditRequest', 'UsersProfileController@validateEditRequest')->name('validate_edit_request')->middleware('myownauth');
