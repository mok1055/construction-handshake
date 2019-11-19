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
Route::get('/', 'MainController@index');

Route::get('home', 'MainController@index');

Route::post('/home/checklogin', 'MainController@checkLogin');

Route::get('dashboard', 'DashboardController@index');

Route::get('logout', 'MainController@logout');