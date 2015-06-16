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

Route::model('product', 'App\Models\Cook\Product');
Route::get('processes/{product}', ['uses' => 'Cook\ProcessesController@index', 'as' => 'processes.index']);
Route::get('processes/{product}/create', ['uses' => 'Cook\ProcessesController@create', 'as' => 'processes.create']);
Route::post('processes/{product}', ['uses' => 'Cook\ProcessesController@store', 'as' => 'processes.store']);
Route::get('processes/{process}/edit', ['uses' => 'Cook\ProcessesController@edit', 'as' => 'processes.edit']);
Route::patch('processes/{process}', ['uses' => 'Cook\ProcessesController@update', 'as' => 'processes.update']);
Route::delete('processes/{process}', ['uses' => 'Cook\ProcessesController@destroy', 'as' => 'processes.destroy']);