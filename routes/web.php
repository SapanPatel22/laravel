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

//new registration form
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






//taks example
// Route::get('/tasks','TasksController@index');
// Route::get('/tasks/{task}','TasksController@show');

// old registration routes
// Route::get('/', 'IndexController@index');
// Route::get('/index/show', 'IndexController@show');
// Route::get('/index/create', 'IndexController@create');
// Route::post('index', 'IndexController@store')->name('submit_login_form');

// Route::get('signup','SignupController@index')->name('signup_form');
// Route::post('register','SignupController@store')->name('register_form');

//default laravel routes
// Route::get('/', function () {
//      return view('welcome');
// });

//some examples on routes
// Route::get('sapan/{value1?}/{value2?}', function ($val1 ,$val2 = 222) {
// 	dd($val1+$val2);
    
// });
// Route::get('/add/{num1}/{num2?}', function ($n1, $n2=0) {    
// 	return $n1 + $n2;
// })->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

// Route::get('dashboard', function () {
//     return view('dashboard');
// });
