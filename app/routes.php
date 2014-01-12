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
Route::get('dashboard', 'DashboardController@dashboard');
Route::get('dashboard/{id}', 'DashboardController@dashboard_viewgroup');

Route::get('group', 'GroupController@index');
Route::get('groups', 'GroupController@index');
Route::get('group/{id}', 'GroupController@view');
Route::post('group/{id}/edit', 'GroupController@edit');
Route::get('group/{id}/offense', 'GroupController@offenses');
Route::post('group/{id}/offense/add', 'GroupController@add_offense');

Route::get('action', 'ActionController@index');
Route::get('actions', 'ActionController@index');
Route::post('action/add', 'ActionController@add');
