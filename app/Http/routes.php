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

Route::get('/', 'WelcomeController@index');





Route::get('home', 'HomeController@index');


Route::get('about', 'PagesController@about');




Route::get('properties', 'PropertiesController@index');
Route::post('properties', 'PropertiesController@store');


Route::get('properties/create', 'PropertiesController@create');

Route::get('properties/{id}', 'PropertiesController@show');
Route::post('properties/{id}', 'PropertiesController@showrange');



Route::get('properties/{id}/edit', 'PropertiesController@edit');
Route::post('properties/{id}/edit', 'PropertiesController@update');



//Route::resource('properties', 'PropertiesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
