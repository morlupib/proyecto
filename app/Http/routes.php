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

Route::auth();

Route::resource('propietarios', 'propietarioController');

Route::resource('cabanas', 'cabanasController');

Route::get('/publicar/{id}', [
	'uses' => 'cabanasController@publicar',
	'as'   => 'publicar'

]);

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
*/
