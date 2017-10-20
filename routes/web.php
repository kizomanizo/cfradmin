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
    return view('static.welcome');
});

Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/change', 'HomeController@change')->name('change');
Route::post('/users/{id}', 'HomeController@password_change')->name('password_change');
Route::get('users/list', 'UserController@list')->name('users_list');
Route::get('/users/delete', 'UserController@delete')->name('users_delete');
Route::post('/users/{id}/suspend', 'UserController@suspend')->name('user_suspend');
Route::post('/users/{id}/release', 'UserController@release')->name('user_release');
Route::post('/users/{id}/recover', 'UserController@recover')->name('user_recover');
Route::post('/users/{id}/deactivate', 'UserController@deactivate')->name('user_deactivate');
Route::post('/users/{id}/purge', 'UserController@purge')->name('user_purge');
Route::get('roles/deleted', 'roleController@deleted')->name('roles_deleted');
Route::get('/roles/{id}/recover', 'RoleController@recover')->name('role_recover');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');