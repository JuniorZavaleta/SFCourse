<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'instituciones', 'as' => 'instituciones.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'InstitucionController@index']);
    Route::post('/', ['as' => 'store', 'uses' => 'InstitucionController@store']);
    Route::get('/buscar', ['as' => 'search', 'uses' => 'InstitucionController@search']);
    Route::post('/{id}/editar', ['as' => 'update', 'uses' => 'InstitucionController@update']);
});

Route::group(['prefix' => 'sedes', 'as' => 'sedes.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'SedeController@index']);
    Route::post('/', ['as' => 'store', 'uses' => 'SedeController@store']);
    Route::get('/{sede}', ['as' => 'show', 'uses' => 'SedeController@show']);
    Route::post('/{sede}/editar', ['as' => 'update', 'uses' => 'SedeController@update']);
});

Route::group(['prefix' => 'facultades', 'as' => 'facultades.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'FacultadController@index']);
    Route::post('/', ['as' => 'store', 'uses' => 'FacultadController@store']);
});
