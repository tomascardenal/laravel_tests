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

Route::view('/', 'home')->name('home')->middleware('example');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::post('contact', 'MessagesController@store');
Route::resource('projects', 'ProjectsController');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('users', 'UsersController');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/videos', 'VideoController@index');
    Route::get('/videos/uploader', 'VideoController@uploader')->name('uploader');
    Route::post('/videos/upload', 'VideoController@store')->name('upload');
});