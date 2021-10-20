<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Agentes
    Route::apiResource('agentes', 'AgentesApiController');

    // Sedes
    Route::apiResource('sedes', 'SedesApiController');

    // Prioridad
    Route::apiResource('prioridads', 'PrioridadApiController');

    // Incidente
    Route::apiResource('incidentes', 'IncidenteApiController');

    // Estado
    Route::apiResource('estados', 'EstadoApiController');

    // Tickets
    Route::post('tickets/media', 'TicketsApiController@storeMedia')->name('tickets.storeMedia');
    Route::apiResource('tickets', 'TicketsApiController');

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController', ['except' => ['update']]);

    // Fichas Tecnicas
    Route::apiResource('fichas-tecnicas', 'FichasTecnicasApiController');

    // Componentes
    Route::apiResource('componentes', 'ComponentesApiController');

    // Maintenance
    Route::apiResource('maintenances', 'MaintenanceApiController');

    // Grupos
    Route::apiResource('grupos', 'GruposApiController');

    // Ficha Tecnica
    Route::post('ficha-tecnicas/media', 'FichaTecnicaApiController@storeMedia')->name('ficha-tecnicas.storeMedia');
    Route::apiResource('ficha-tecnicas', 'FichaTecnicaApiController');

    // Reparacion
    Route::apiResource('reparacions', 'ReparacionApiController');

    // Proyectos Articulados
    Route::post('proyectos-articulados/media', 'ProyectosArticuladosApiController@storeMedia')->name('proyectos-articulados.storeMedia');
    Route::apiResource('proyectos-articulados', 'ProyectosArticuladosApiController');

    // Empleos
    Route::post('empleos/media', 'EmpleosApiController@storeMedia')->name('empleos.storeMedia');
    Route::apiResource('empleos', 'EmpleosApiController');

    // Candidatos
    Route::apiResource('candidatos', 'CandidatosApiController');

    // Documentos Candidatos
    Route::post('documentos-candidatos/media', 'DocumentosCandidatosApiController@storeMedia')->name('documentos-candidatos.storeMedia');
    Route::apiResource('documentos-candidatos', 'DocumentosCandidatosApiController');

    // Idiomasgestionhumana
    Route::apiResource('idiomasgestionhumanas', 'IdiomasgestionhumanaApiController');
});
