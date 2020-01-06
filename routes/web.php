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

Route::get('/home', 'MainController@index');

Route::post('/home/checklogin', 'MainController@checkLogin');

Route::get('/logout', 'MainController@logout');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/projects', 'ProjectController');
Route::patch('/projects/{id}/add-person', 'ProjectController@addPerson');
