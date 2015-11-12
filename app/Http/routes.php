<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('pantera','PanelController');

Route::get('/', 'HomeController@index');

Route::post('cadastro', 'RegisterController@create');

Route::get('cadastro', 'RegisterController@index');

Route::get('ranking', 'RankingController@index');

Route::get('ranking/{type}', 'RankingController@ranking');


Route::get('login','LoginController@index');

Route::post('login', 'LoginController@create');
Route::post('painel', 'PanelController@update');

Route::get('logout', 'LoginController@logout');

Route::get('painel', 'PanelController@index');