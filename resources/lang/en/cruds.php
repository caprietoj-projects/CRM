<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'agente' => [
        'title'          => 'Agentes',
        'title_singular' => 'Agente',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nombre'            => 'Nombre',
            'nombre_helper'     => ' ',
            'cargo'             => 'Cargo',
            'cargo_helper'      => ' ',
            'correo'            => 'Correo',
            'correo_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'sede' => [
        'title'          => 'Sedes',
        'title_singular' => 'Sede',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'sede'              => 'Sede',
            'sede_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'prioridad' => [
        'title'          => 'Prioridad',
        'title_singular' => 'Prioridad',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'tipo_de_prioridad'        => 'Tipo De Prioridad',
            'tipo_de_prioridad_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'incidente' => [
        'title'          => 'Incidente',
        'title_singular' => 'Incidente',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'tipo_de_incidente'        => 'Tipo De Incidente',
            'tipo_de_incidente_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'estado' => [
        'title'          => 'Estado',
        'title_singular' => 'Estado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'estado'            => 'Estado',
            'estado_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'ticket' => [
        'title'          => 'Tickets',
        'title_singular' => 'Ticket',
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => ' ',
            'nombre'                                    => 'Nombre',
            'nombre_helper'                             => ' ',
            'correo'                                    => 'Correo',
            'correo_helper'                             => ' ',
            'id_incidente'                              => 'Incidente',
            'id_incidente_helper'                       => ' ',
            'id_prioridad'                              => 'Prioridad',
            'id_prioridad_helper'                       => ' ',
            'id_sede'                                   => 'Sede',
            'id_sede_helper'                            => ' ',
            'comentenos_mas_sobre_su_incidencia'        => 'Descripción del Incidente',
            'comentenos_mas_sobre_su_incidencia_helper' => ' ',
            'adjuntar_archivo'                          => 'Adjuntar Archivo',
            'adjuntar_archivo_helper'                   => ' ',
            'created_at'                                => 'Created at',
            'created_at_helper'                         => ' ',
            'updated_at'                                => 'Updated at',
            'updated_at_helper'                         => ' ',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => ' ',
            'created_by'                                => 'Created By',
            'created_by_helper'                         => ' ',
            'id_asignado'                               => 'Asignado a:',
            'id_asignado_helper'                        => ' ',
            'estado'                                    => 'Estado',
            'estado_helper'                             => ' ',
            'solucion'                                  => 'Solución',
            'solucion_helper'                           => ' ',
        ],
    ],
    'parametro' => [
        'title'          => 'Parametros',
        'title_singular' => 'Parametro',
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alerta',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Link de la Alerta',
            'alert_link_helper' => ' ',
            'user'              => 'Usuarios',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'sistema' => [
        'title'          => 'Sistemas',
        'title_singular' => 'Sistema',
    ],
    'fichasTecnica' => [
        'title'          => 'Fichas Tecnicas',
        'title_singular' => 'Fichas Tecnica',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'encargado'                => 'Encargado',
            'encargado_helper'         => ' ',
            'nombre_del_equipo'        => 'Nombre Del Equipo',
            'nombre_del_equipo_helper' => ' ',
            'modelo'                   => 'Modelo',
            'modelo_helper'            => ' ',
            'serial'                   => 'Serial',
            'serial_helper'            => ' ',
            'sede'                     => 'Sede',
            'sede_helper'              => ' ',
            'observaciones'            => 'Observaciones',
            'observaciones_helper'     => ' ',
            'estado_del_activo'        => 'Estado Del Activo',
            'estado_del_activo_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'componentes'              => 'Componentes',
            'componentes_helper'       => ' ',
        ],
    ],
    'imprimir' => [
        'title'          => 'Imprimir',
        'title_singular' => 'Imprimir',
    ],
    'componente' => [
        'title'          => 'Componentes',
        'title_singular' => 'Componente',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'nombre_del_activo'        => 'Nombre Del Activo',
            'nombre_del_activo_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
        ],
    ],
    'mantenimiento' => [
        'title'          => 'Mantenimiento',
        'title_singular' => 'Mantenimiento',
    ],
    'imprimirmto' => [
        'title'          => 'Imprimir',
        'title_singular' => 'Imprimir',
    ],
    'helpDesk' => [
        'title'          => 'Help Desk',
        'title_singular' => 'Help Desk',
    ],
    'maintenance' => [
        'title'          => 'Mantenimiento',
        'title_singular' => 'Mantenimiento',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'tipo'                    => 'Tipo',
            'tipo_helper'             => ' ',
            'fecha'                   => 'Fecha',
            'fecha_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'area'                    => 'Area',
            'area_helper'             => ' ',
            'quien_lo_realiza'        => 'Quien Lo Realiza',
            'quien_lo_realiza_helper' => ' ',
            'descripcion'             => 'Descripción',
            'descripcion_helper'      => ' ',
        ],
    ],
    'atencionAlUsuario' => [
        'title'          => 'Atención al Usuario',
        'title_singular' => 'Atención al Usuario',
    ],
    'grupo' => [
        'title'          => 'Grupos',
        'title_singular' => 'Grupo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nombre'            => 'Nombre',
            'nombre_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'fichaTecnica' => [
        'title'          => 'Ficha Tecnica',
        'title_singular' => 'Ficha Tecnica',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'descripcion'        => 'Descripcion',
            'descripcion_helper' => ' ',
            'grupo'              => 'Grupo',
            'grupo_helper'       => ' ',
            'modelo'             => 'Modelo',
            'modelo_helper'      => ' ',
            'serial'             => 'Serial',
            'serial_helper'      => ' ',
            'color'              => 'Color',
            'color_helper'       => ' ',
            'tipo'               => 'Tipo',
            'tipo_helper'        => ' ',
            'ubicacion'          => 'Ubicacion',
            'ubicacion_helper'   => ' ',
            'encargado'          => 'Encargado',
            'encargado_helper'   => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
            'foto'               => 'Foto',
            'foto_helper'        => ' ',
        ],
    ],
    'reparacion' => [
        'title'          => 'Reparación',
        'title_singular' => 'Reparación',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'activo'            => 'Activo',
            'activo_helper'     => ' ',
            'fecha'             => 'Fecha',
            'fecha_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'tipo'              => 'Tipo',
            'tipo_helper'       => ' ',
        ],
    ],
    'financiera' => [
        'title'          => 'Financiera',
        'title_singular' => 'Financiera',
    ],
    'administracion' => [
        'title'          => 'Administración',
        'title_singular' => 'Administración',
    ],
    'calidad' => [
        'title'          => 'Calidad',
        'title_singular' => 'Calidad',
    ],
    'admisione' => [
        'title'          => 'Admisiones',
        'title_singular' => 'Admisione',
    ],
    'promocionInstitucional' => [
        'title'          => 'Promoción Institucional',
        'title_singular' => 'Promoción Institucional',
    ],
    'convenioMan' => [
        'title'          => 'Convenio MEN',
        'title_singular' => 'Convenio MAN',
    ],
    'sae' => [
        'title'          => 'SAE',
        'title_singular' => 'SAE',
    ],
    'bienestar' => [
        'title'          => 'Bienestar',
        'title_singular' => 'Bienestar',
    ],
    'biblioteca' => [
        'title'          => 'Biblioteca',
        'title_singular' => 'Biblioteca',
    ],
    'pastoral' => [
        'title'          => 'Pastoral',
        'title_singular' => 'Pastoral',
    ],
    'academica' => [
        'title'          => 'Académica',
        'title_singular' => 'Académica',
    ],
    'plataforma' => [
        'title'          => 'Plataformas',
        'title_singular' => 'Plataforma',
    ],
    'schoolpack' => [
        'title'          => 'School Pack',
        'title_singular' => 'School Pack',
    ],
    'trendi' => [
        'title'          => 'Trendi',
        'title_singular' => 'Trendi',
    ],
    'progrenti' => [
        'title'          => 'Progrentis',
        'title_singular' => 'Progrenti',
    ],
    'rectorium' => [
        'title'          => 'Rectoria',
        'title_singular' => 'Rectorium',
    ],
    'cumpleano' => [
        'title'          => 'Cumpleaños',
        'title_singular' => 'Cumpleaño',
    ],
    'regionalizacion' => [
        'title'          => 'Regionalización',
        'title_singular' => 'Regionalización',
    ],
    'proyectosArticulado' => [
        'title'          => 'Proyectos Articulados',
        'title_singular' => 'Proyectos Articulado',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'nombre_del_estudiante'        => 'Nombre Del Estudiante',
            'nombre_del_estudiante_helper' => ' ',
            'curso'                        => 'Curso',
            'curso_helper'                 => ' ',
            'tema_del_proyecto'            => 'Tema Del Proyecto',
            'tema_del_proyecto_helper'     => ' ',
            'proyecto'                     => 'Proyecto',
            'proyecto_helper'              => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'created_by'                   => 'Created By',
            'created_by_helper'            => ' ',
        ],
    ],
    'empleo' => [
        'title'          => 'Empleos',
        'title_singular' => 'Empleo',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'vacante'            => 'Vacante',
            'vacante_helper'     => ' ',
            'descripcion'        => 'Descripcion',
            'descripcion_helper' => ' ',
            'requisitos'         => 'Requisitos',
            'requisitos_helper'  => ' ',
            'tiempo'             => 'Tiempo',
            'tiempo_helper'      => ' ',
            'salario'            => 'Salario',
            'salario_helper'     => ' ',
            'empresa'            => 'Empresa',
            'empresa_helper'     => 'Fundación Colegio Mayor de San Bartolomé',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'gestionHumana' => [
        'title'          => 'Gestión Humana',
        'title_singular' => 'Gestión Humana',
    ],
    'sgSst' => [
        'title'          => 'SG-SST',
        'title_singular' => 'SG-SST',
    ],
    'planDeFormacion' => [
        'title'          => 'Plan De Formación',
        'title_singular' => 'Plan De Formación',
    ],
    'evaluacionDeDesempeno' => [
        'title'          => 'Evaluación De Desempeño',
        'title_singular' => 'Evaluación De Desempeño',
    ],
    'hojasDeVida' => [
        'title'          => 'Hojas De Vida',
        'title_singular' => 'Hojas De Vida',
    ],
    'certificadoLaboral' => [
        'title'          => 'Certificado Laboral',
        'title_singular' => 'Certificado Laboral',
    ],
    'cerficadodefuncione' => [
        'title'          => 'Certificado de Funciones',
        'title_singular' => 'Certificado de Funcione',
    ],
];