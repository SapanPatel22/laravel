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

// Route::get('/tasks','TasksController@index');
// Route::get('/tasks/{task}','TasksController@show');
Route::get('/', 'IndexController@index');
Route::get('/index/show', 'IndexController@show');
Route::get('/index/create', 'IndexController@create');
Route::post('index', 'IndexController@store')->name('submit_login_form');

Route::get('signup','SignupController@index')->name('signup_form');
// Route::get('/', function () {
//      return view('welcome');
// });

// Route::get('sapan/{value1?}/{value2?}', function ($val1 ,$val2 = 222) {
// 	dd($val1+$val2);
    
// });
// Route::get('/add/{num1}/{num2?}', function ($n1, $n2=0) {    
// 	return $n1 + $n2;
// })->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

// Route::get('dashboard', function () {
//     return view('dashboard');
// });
