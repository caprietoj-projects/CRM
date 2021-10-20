<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Agentes
    Route::delete('agentes/destroy', 'AgentesController@massDestroy')->name('agentes.massDestroy');
    Route::resource('agentes', 'AgentesController');

    // Sedes
    Route::delete('sedes/destroy', 'SedesController@massDestroy')->name('sedes.massDestroy');
    Route::resource('sedes', 'SedesController');

    // Prioridad
    Route::delete('prioridads/destroy', 'PrioridadController@massDestroy')->name('prioridads.massDestroy');
    Route::resource('prioridads', 'PrioridadController');

    // Incidente
    Route::delete('incidentes/destroy', 'IncidenteController@massDestroy')->name('incidentes.massDestroy');
    Route::resource('incidentes', 'IncidenteController');

    // Estado
    Route::delete('estados/destroy', 'EstadoController@massDestroy')->name('estados.massDestroy');
    Route::resource('estados', 'EstadoController');

    // Tickets
    Route::delete('tickets/destroy', 'TicketsController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketsController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/ckmedia', 'TicketsController@storeCKEditorImages')->name('tickets.storeCKEditorImages');
    Route::resource('tickets', 'TicketsController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Fichas Tecnicas
    Route::delete('fichas-tecnicas/destroy', 'FichasTecnicasController@massDestroy')->name('fichas-tecnicas.massDestroy');
    Route::post('fichas-tecnicas/parse-csv-import', 'FichasTecnicasController@parseCsvImport')->name('fichas-tecnicas.parseCsvImport');
    Route::post('fichas-tecnicas/process-csv-import', 'FichasTecnicasController@processCsvImport')->name('fichas-tecnicas.processCsvImport');
    Route::resource('fichas-tecnicas', 'FichasTecnicasController');

    // Imprimir
    Route::delete('imprimirs/destroy', 'ImprimirController@massDestroy')->name('imprimirs.massDestroy');
    Route::resource('imprimirs', 'ImprimirController');

    // Componentes
    Route::delete('componentes/destroy', 'ComponentesController@massDestroy')->name('componentes.massDestroy');
    Route::post('componentes/parse-csv-import', 'ComponentesController@parseCsvImport')->name('componentes.parseCsvImport');
    Route::post('componentes/process-csv-import', 'ComponentesController@processCsvImport')->name('componentes.processCsvImport');
    Route::resource('componentes', 'ComponentesController');

    // Imprimirmto
    Route::delete('imprimirmtos/destroy', 'ImprimirmtoController@massDestroy')->name('imprimirmtos.massDestroy');
    Route::resource('imprimirmtos', 'ImprimirmtoController');

    // Maintenance
    Route::delete('maintenances/destroy', 'MaintenanceController@massDestroy')->name('maintenances.massDestroy');
    Route::post('maintenances/parse-csv-import', 'MaintenanceController@parseCsvImport')->name('maintenances.parseCsvImport');
    Route::post('maintenances/process-csv-import', 'MaintenanceController@processCsvImport')->name('maintenances.processCsvImport');
    Route::resource('maintenances', 'MaintenanceController');

    // Atencion Al Usuario
    Route::delete('atencion-al-usuarios/destroy', 'AtencionAlUsuarioController@massDestroy')->name('atencion-al-usuarios.massDestroy');
    Route::resource('atencion-al-usuarios', 'AtencionAlUsuarioController');

    // Grupos
    Route::delete('grupos/destroy', 'GruposController@massDestroy')->name('grupos.massDestroy');
    Route::post('grupos/parse-csv-import', 'GruposController@parseCsvImport')->name('grupos.parseCsvImport');
    Route::post('grupos/process-csv-import', 'GruposController@processCsvImport')->name('grupos.processCsvImport');
    Route::resource('grupos', 'GruposController');

    // Ficha Tecnica
    Route::delete('ficha-tecnicas/destroy', 'FichaTecnicaController@massDestroy')->name('ficha-tecnicas.massDestroy');
    Route::post('ficha-tecnicas/media', 'FichaTecnicaController@storeMedia')->name('ficha-tecnicas.storeMedia');
    Route::post('ficha-tecnicas/ckmedia', 'FichaTecnicaController@storeCKEditorImages')->name('ficha-tecnicas.storeCKEditorImages');
    Route::post('ficha-tecnicas/parse-csv-import', 'FichaTecnicaController@parseCsvImport')->name('ficha-tecnicas.parseCsvImport');
    Route::post('ficha-tecnicas/process-csv-import', 'FichaTecnicaController@processCsvImport')->name('ficha-tecnicas.processCsvImport');
    Route::resource('ficha-tecnicas', 'FichaTecnicaController');

    // Reparacion
    Route::delete('reparacions/destroy', 'ReparacionController@massDestroy')->name('reparacions.massDestroy');
    Route::post('reparacions/parse-csv-import', 'ReparacionController@parseCsvImport')->name('reparacions.parseCsvImport');
    Route::post('reparacions/process-csv-import', 'ReparacionController@processCsvImport')->name('reparacions.processCsvImport');
    Route::resource('reparacions', 'ReparacionController');

    // Financiera
    Route::delete('financieras/destroy', 'FinancieraController@massDestroy')->name('financieras.massDestroy');
    Route::resource('financieras', 'FinancieraController');

    // Administracion
    Route::delete('administracions/destroy', 'AdministracionController@massDestroy')->name('administracions.massDestroy');
    Route::resource('administracions', 'AdministracionController');

    // Calidad
    Route::delete('calidads/destroy', 'CalidadController@massDestroy')->name('calidads.massDestroy');
    Route::resource('calidads', 'CalidadController');

    // Admisiones
    Route::delete('admisiones/destroy', 'AdmisionesController@massDestroy')->name('admisiones.massDestroy');
    Route::resource('admisiones', 'AdmisionesController');

    // Promocion Institucional
    Route::delete('promocion-institucionals/destroy', 'PromocionInstitucionalController@massDestroy')->name('promocion-institucionals.massDestroy');
    Route::resource('promocion-institucionals', 'PromocionInstitucionalController');

    // Convenio Men
    Route::delete('convenio-men/destroy', 'ConvenioMenController@massDestroy')->name('convenio-men.massDestroy');
    Route::resource('convenio-men', 'ConvenioMenController');

    // Sae
    Route::delete('saes/destroy', 'SaeController@massDestroy')->name('saes.massDestroy');
    Route::resource('saes', 'SaeController');

    // Bienestar
    Route::delete('bienestars/destroy', 'BienestarController@massDestroy')->name('bienestars.massDestroy');
    Route::resource('bienestars', 'BienestarController');

    // Biblioteca
    Route::delete('bibliotecas/destroy', 'BibliotecaController@massDestroy')->name('bibliotecas.massDestroy');
    Route::resource('bibliotecas', 'BibliotecaController');

    // Pastoral
    Route::delete('pastorals/destroy', 'PastoralController@massDestroy')->name('pastorals.massDestroy');
    Route::resource('pastorals', 'PastoralController');

    // Academica
    Route::delete('academicas/destroy', 'AcademicaController@massDestroy')->name('academicas.massDestroy');
    Route::resource('academicas', 'AcademicaController');

    // Schoolpack
    Route::delete('schoolpacks/destroy', 'SchoolpackController@massDestroy')->name('schoolpacks.massDestroy');
    Route::resource('schoolpacks', 'SchoolpackController');

    // Trendi
    Route::delete('trendis/destroy', 'TrendiController@massDestroy')->name('trendis.massDestroy');
    Route::resource('trendis', 'TrendiController');

    // Progrentis
    Route::delete('progrentis/destroy', 'ProgrentisController@massDestroy')->name('progrentis.massDestroy');
    Route::resource('progrentis', 'ProgrentisController');

    // Cumpleanos
    Route::delete('cumpleanos/destroy', 'CumpleanosController@massDestroy')->name('cumpleanos.massDestroy');
    Route::resource('cumpleanos', 'CumpleanosController');

    // Proyectos Articulados
    Route::delete('proyectos-articulados/destroy', 'ProyectosArticuladosController@massDestroy')->name('proyectos-articulados.massDestroy');
    Route::post('proyectos-articulados/media', 'ProyectosArticuladosController@storeMedia')->name('proyectos-articulados.storeMedia');
    Route::post('proyectos-articulados/ckmedia', 'ProyectosArticuladosController@storeCKEditorImages')->name('proyectos-articulados.storeCKEditorImages');
    Route::post('proyectos-articulados/parse-csv-import', 'ProyectosArticuladosController@parseCsvImport')->name('proyectos-articulados.parseCsvImport');
    Route::post('proyectos-articulados/process-csv-import', 'ProyectosArticuladosController@processCsvImport')->name('proyectos-articulados.processCsvImport');
    Route::resource('proyectos-articulados', 'ProyectosArticuladosController');

    // Empleos
    Route::delete('empleos/destroy', 'EmpleosController@massDestroy')->name('empleos.massDestroy');
    Route::post('empleos/media', 'EmpleosController@storeMedia')->name('empleos.storeMedia');
    Route::post('empleos/ckmedia', 'EmpleosController@storeCKEditorImages')->name('empleos.storeCKEditorImages');
    Route::post('empleos/parse-csv-import', 'EmpleosController@parseCsvImport')->name('empleos.parseCsvImport');
    Route::post('empleos/process-csv-import', 'EmpleosController@processCsvImport')->name('empleos.processCsvImport');
    Route::resource('empleos', 'EmpleosController');

    // Sg Sst
    Route::delete('sg-ssts/destroy', 'SgSstController@massDestroy')->name('sg-ssts.massDestroy');
    Route::resource('sg-ssts', 'SgSstController');

    // Plan De Formacion
    Route::delete('plan-de-formacions/destroy', 'PlanDeFormacionController@massDestroy')->name('plan-de-formacions.massDestroy');
    Route::resource('plan-de-formacions', 'PlanDeFormacionController');

    // Evaluacion De Desempeno
    Route::delete('evaluacion-de-desempenos/destroy', 'EvaluacionDeDesempenoController@massDestroy')->name('evaluacion-de-desempenos.massDestroy');
    Route::resource('evaluacion-de-desempenos', 'EvaluacionDeDesempenoController');

    // Hojas De Vida
    Route::delete('hojas-de-vidas/destroy', 'HojasDeVidaController@massDestroy')->name('hojas-de-vidas.massDestroy');
    Route::resource('hojas-de-vidas', 'HojasDeVidaController');

    // Certificado Laboral
    Route::delete('certificado-laborals/destroy', 'CertificadoLaboralController@massDestroy')->name('certificado-laborals.massDestroy');
    Route::resource('certificado-laborals', 'CertificadoLaboralController');

    // Cerficadodefunciones
    Route::delete('cerficadodefunciones/destroy', 'CerficadodefuncionesController@massDestroy')->name('cerficadodefunciones.massDestroy');
    Route::resource('cerficadodefunciones', 'CerficadodefuncionesController');

    // Pruebas Psicotecnicas
    Route::delete('pruebas-psicotecnicas/destroy', 'PruebasPsicotecnicasController@massDestroy')->name('pruebas-psicotecnicas.massDestroy');
    Route::resource('pruebas-psicotecnicas', 'PruebasPsicotecnicasController');

    // Candidatos
    Route::delete('candidatos/destroy', 'CandidatosController@massDestroy')->name('candidatos.massDestroy');
    Route::post('candidatos/parse-csv-import', 'CandidatosController@parseCsvImport')->name('candidatos.parseCsvImport');
    Route::post('candidatos/process-csv-import', 'CandidatosController@processCsvImport')->name('candidatos.processCsvImport');
    Route::resource('candidatos', 'CandidatosController');

    // Documentos Candidatos
    Route::delete('documentos-candidatos/destroy', 'DocumentosCandidatosController@massDestroy')->name('documentos-candidatos.massDestroy');
    Route::post('documentos-candidatos/media', 'DocumentosCandidatosController@storeMedia')->name('documentos-candidatos.storeMedia');
    Route::post('documentos-candidatos/ckmedia', 'DocumentosCandidatosController@storeCKEditorImages')->name('documentos-candidatos.storeCKEditorImages');
    Route::resource('documentos-candidatos', 'DocumentosCandidatosController');

    // Idiomasgestionhumana
    Route::delete('idiomasgestionhumanas/destroy', 'IdiomasgestionhumanaController@massDestroy')->name('idiomasgestionhumanas.massDestroy');
    Route::resource('idiomasgestionhumanas', 'IdiomasgestionhumanaController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
