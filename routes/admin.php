<?php

Route::group(['prefix' => 'instituciones', 'as' => 'instituciones.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'InstitucionController@index']);
    Route::get('/nuevo', ['as' => 'create', 'uses' => 'InstitucionController@create']);
    Route::post('/nuevo', ['as' => 'store', 'uses' => 'InstitucionController@store']);

    Route::group(['prefix' => '{institucion}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'InstitucionController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'InstitucionController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'InstitucionController@delete']);
    });
});

Route::group(['prefix' => 'sedes', 'as' => 'sedes.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'SedeController@index']);
    Route::get('/nuevo', ['as' => 'create', 'uses' => 'SedeController@create']);
    Route::post('/nuevo', ['as' => 'store', 'uses' => 'SedeController@store']);

    Route::group(['prefix' => '{sede}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'SedeController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'SedeController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'SedeController@delete']);

        Route::group(['prefix' => 'facultades', 'as' => 'facultades.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'SedeFacultadesController@index']);
            Route::post('/', ['as' => 'store', 'uses' => 'SedeFacultadesController@store']);

            Route::group(['prefix' => '{facultad}/ambientes', 'as' => 'ambientes.'], function() {
                Route::get('/', ['as' => 'index', 'uses' => 'AmbienteController@index']);
                Route::get('/nuevo', ['as' => 'create', 'uses' => 'AmbienteController@create']);
                Route::post('/nuevo', ['as' => 'store', 'uses' => 'AmbienteController@store']);
            });
        });
    });
});

Route::group(['prefix' => 'facultades', 'as' => 'facultades.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'FacultadController@index']);
    Route::get('/nuevo', ['as' => 'create', 'uses' => 'FacultadController@create']);
    Route::post('/nuevo', ['as' => 'store', 'uses' => 'FacultadController@store']);

    Route::group(['prefix' => '{facultad}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'FacultadController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'FacultadController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'FacultadController@delete']);

        Route::group(['prefix' => 'periodos', 'as' => 'periodos.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'PeriodoController@index']);
            Route::get('/nuevo', ['as' => 'create', 'uses' => 'PeriodoController@create']);
            Route::post('/nuevo', ['as' => 'store', 'uses' => 'PeriodoController@store']);

            Route::group(['prefix' => '{periodo}'], function() {
                Route::get('/editar', ['as' => 'edit', 'uses' => 'PeriodoController@edit']);
                Route::post('/editar', ['as' => 'update', 'uses' => 'PeriodoController@update']);
                Route::post('/eliminar', ['as' => 'delete', 'uses' => 'PeriodoController@delete']);
            });
        });

        Route::group(['prefix' => 'departamentos', 'as' => 'departamentos.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'DepartamentoAcademicoController@index']);
            Route::get('/nuevo', ['as' => 'create', 'uses' => 'DepartamentoAcademicoController@create']);
            Route::post('/nuevo', ['as' => 'store', 'uses' => 'DepartamentoAcademicoController@store']);

            Route::group(['prefix' => '{departamento_academico}'], function() {
                Route::get('/editar', ['as' => 'edit', 'uses' => 'DepartamentoAcademicoController@edit']);
                Route::post('/editar', ['as' => 'update', 'uses' => 'DepartamentoAcademicoController@update']);
                Route::post('/eliminar', ['as' => 'delete', 'uses' => 'DepartamentoAcademicoController@delete']);

                Route::group(['prefix' => 'docentes', 'as' => 'docentes.'], function() {
                    Route::get('/', ['as' => 'index', 'uses' => 'DocenteController@index']);
                });
            });
        });
    });
});

Route::group(['prefix' => 'eaps', 'as' => 'eaps.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'EscuelaController@index']);
    Route::get('/nuevo', ['as' => 'create', 'uses' => 'EscuelaController@create']);
    Route::post('/nuevo', ['as' => 'store', 'uses' => 'EscuelaController@store']);

    Route::group(['prefix' => '{eap}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'EscuelaController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'EscuelaController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'EscuelaController@delete']);

        Route::group(['prefix' => 'planes', 'as' => 'planes.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'PlanEstudioController@index']);
            Route::get('/nuevo', ['as' => 'create', 'uses' => 'PlanEstudioController@create']);
            Route::post('/nuevo', ['as' => 'store', 'uses' => 'PlanEstudioController@store']);

            Route::group(['prefix' => '{plan}'], function() {
                Route::get('/editar', ['as' => 'edit', 'uses' => 'PlanEstudioController@edit']);
                Route::post('/editar', ['as' => 'update', 'uses' => 'PlanEstudioController@update']);
                Route::post('/eliminar', ['as' => 'delete', 'uses' => 'PlanEstudioController@delete']);
            });
        });
    });

});

Route::group(['prefix' => 'grupos', 'as' => 'grupos.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'GrupoController@index']);

    Route::group(['prefix' => '{grupo}'], function() {
        Route::group(['prefix' => 'evaluaciones', 'as' => 'evaluaciones.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'EvaluacionController@index']);
            Route::get('/nuevo', ['as' => 'create', 'uses' => 'EvaluacionController@create']);
            Route::post('/nuevo', ['as' => 'store', 'uses' => 'EvaluacionController@store']);

            Route::group(['prefix' => '{evaluacion}'], function() {
                Route::get('/editar', ['as' => 'edit', 'uses' => 'EvaluacionController@edit']);
                Route::post('/editar', ['as' => 'update', 'uses' => 'EvaluacionController@update']);
                Route::post('/eliminar', ['as' => 'delete', 'uses' => 'EvaluacionController@delete']);

                Route::group(['prefix' => 'resultados', 'as' => 'notas.'], function() {
                    Route::get('/mostrar', ['as' => 'show', 'uses' => 'ResultadoEvaluacionController@show']);
                    Route::get('/notas', ['as' => 'edit', 'uses' => 'ResultadoEvaluacionController@edit']);
                    Route::post('/notas', ['as' => 'edit', 'uses' => 'ResultadoEvaluacionController@update']);
                });
            });
        });
    });

});

Route::group(['prefix' => 'lista_blanca', 'as' => 'lista_blanca.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ListaBlancaController@index']);
    Route::get('/nuevo', ['as' => 'create', 'uses' => 'ListaBlancaController@create']);
    Route::post('/nuevo', ['as' => 'store', 'uses' => 'ListaBlancaController@store']);

    Route::group(['prefix' => '{ip_lista_blanca}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'ListaBlancaController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'ListaBlancaController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'ListaBlancaController@delete']);
    });
});

Route::group(['prefix' => 'incidente', 'as' => 'incidente.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'IncidenteController@index']);
    Route::get('/{incidente}/mostrar', ['as' => 'show', 'uses' => 'IncidenteController@show']);
    Route::get('/filtrar', ['as' => 'filter', 'uses' => 'IncidenteController@filter']);

});

Route::group(['prefix' => 'ambientes', 'as' => 'ambientes.'], function() {
    Route::group(['prefix' => '{ambiente}'], function() {
        Route::get('/editar', ['as' => 'edit', 'uses' => 'AmbienteController@edit']);
        Route::post('/editar', ['as' => 'update', 'uses' => 'AmbienteController@update']);
        Route::post('/eliminar', ['as' => 'delete', 'uses' => 'AmbienteController@delete']);
    });
});

Route::get('/syllabus', function(){
    return view('syllabus');
});