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

Route::get('users_profile','UsersProfileController@index')->name('users_profile')->middleware('myownauth');

Route::get('edit','UsersProfileController@edit')->name('edit_user')->middleware('myownauth');

Route::post('validateEditRequest', 'UsersProfileController@validateEditRequest')->name('validate_edit_request')->middleware('myownauth');

Route::get('delete', 'UsersProfileController@delete')->name('delete_user')->middleware('myownauth');

Route::get('createUser','CreateUserController@index')->name('create_user')->middleware('myownauth');
Route::post('createUser','CreateUserController@create')->name('create_user_role')->middleware('myownauth');


Route::get('viewUserRoles','CreateUserController@view')->name('view_user_role');
Route::get('editUserRole','CreateUserController@edit')->name('edit_user_role')->middleware('myownauth');
Route::post('updateUserRole','CreateUserController@update')->name('update_user_role');
Route::get('delete', 'UsersProfileController@delete')->name('delete_user')->middleware('myownauth');

Route::get('cmsPage', 'CreateCmsPageController@index')->name('cms_page')->middleware('myownauth');
Route::post('validateCreatePageRequest', 'CreateCmsPageController@create')->name('create_cms_page');
Route::get('cmsPage/{url?}', 'CreateCmsPageController@view')->name('view_cms_page');

Route::get('cmsPageShow');
Route::get('cmsPageList', 'CreateCmsPageController@viewPageList')->name('view_page_list');
Route::get('cmsPageEdit', 'CreateCmsPageController@viewEditPage')->name('view_edit_page')->middleware('myownauth');

Route::get('deletePage' , 'CreateCmsPageController@deletePage')->name('delete_page');

Route::get('logout', 'DashboardController@logout')->name('logout');