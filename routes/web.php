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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Profile route
Route::get('/profile', function () {
    return view('profile/profile');
});
Route::resource('/profile-api', 'ProfileController');
Route::post('/avatar-upload', 'ProfileController@avatarupload');

//Job Register route
Route::get('/service', function () {
    return view('admin/service/service');
});
Route::resource('/service-api', 'ServiceController');
