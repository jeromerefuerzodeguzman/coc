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
Route::get('/', 'DashboardController@dashboard');
Route::get('dashboard/{id}', 'DashboardController@dashboard');
Route::post('search', 'DashboardController@search');

Route::get('group', 'GroupController@index');
Route::get('groups', 'GroupController@index');
Route::get('group/{id}', 'GroupController@view');
Route::post('group/{id}/edit', 'GroupController@edit');
Route::get('group/{id}/offense', 'GroupController@offenses');
Route::post('group/{id}/offense/add', 'GroupController@add_offense');

Route::get('action', 'ActionController@index');
Route::get('actions', 'ActionController@index');
Route::post('action/add', 'ActionController@add');

Route::any('registration', 'UserController@registration');
Route::any('manage_users', 'UserController@manage_users');
Route::post('add_user', 'UserController@add_user');

Route::get('offense/{id}/getinfo', 'OffenseController@getinfo');
Route::post('offense/update', 'OffenseController@update_actions');

