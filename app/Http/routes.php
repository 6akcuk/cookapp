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

Route::get('/', 'HomeController@index');

Route::get('auth/vk', 'Auth\SocialNetworkController@vk');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');

Route::resources([
  'countries' => 'Geography\CountriesController',
  'cities' => 'Geography\CitiesController'
]);

/** Кулинария */
Route::resource('categories', 'Cook\CategoriesController');
Route::resource('products', 'Cook\ProductsController');