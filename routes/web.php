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

Route::post('checklogin', 'MainController@checkLogin');

Route::get('logout', 'MainController@logout');

Route::get('dashboard', 'DashboardController@index');
Route::get('agenda', 'DashboardController@agenda');

Route::get('profile', 'ProfileController@index');
Route::put('profile/update', 'ProfileController@update');

Route::resource('projects', 'ProjectController');
Route::get('projects/{id}/view-users/', 'ProjectController@viewUsers');
Route::put('projects/{id}/edit-metadata/', 'ProjectController@editMetaData');
Route::delete('projects/{projectId}/delete-user/{userId}', 'ProjectController@deleteUser');
Route::get('projects/{id}/rate-work/', 'ProjectController@rateWork');
Route::post('projects/{id}/rate-work/add/', 'ProjectController@addRating');
