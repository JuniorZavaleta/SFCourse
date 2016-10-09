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
