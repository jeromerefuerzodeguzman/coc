<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', 'UserController@login');
Route::any('logout', 'UserController@logout');
Route::post('authenticate', 'UserController@authenticate');
Route::get('dashboard', 'UserController@dashboard');
Route::get('dashboard/{id}', 'UserController@dashboard_viewgroup');

Route::get('group', 'GroupController@index');
Route::get('groups', 'GroupController@index');
Route::get('group/{id}', 'GroupController@view');
Route::get('group/{id}/offense', 'GroupController@offenses');
Route::post('group/{id}/offense/add', 'GroupController@add_offense');