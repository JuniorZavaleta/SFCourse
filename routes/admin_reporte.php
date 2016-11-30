<?php

Route::group(['prefix' => 'incidentes', 'as' => 'incidentes.reportes.'], function(){
    Route::post('/por_pais', ['as' => 'byCountry', 'uses' => 'IncidenteController@getByCountry']);
    Route::post('/entre_fechas', ['as' => 'betweenDates', 'uses' => 'IncidenteController@betweenDates']);
});