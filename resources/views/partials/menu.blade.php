<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('atencion_al_usuario_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.atencion-al-usuarios.index") }}" class="nav-link {{ request()->is("admin/atencion-al-usuarios") || request()->is("admin/atencion-al-usuarios/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-check">

                            </i>
                            <p>
                                {{ trans('cruds.atencionAlUsuario.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('rectorium_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/cumpleanos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-unlock-alt">

                            </i>
                            <p>
                                {{ trans('cruds.rectorium.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('cumpleano_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cumpleanos.index") }}" class="nav-link {{ request()->is("admin/cumpleanos") || request()->is("admin/cumpleanos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-birthday-cake">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cumpleano.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('administracion_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.administracions.index") }}" class="nav-link {{ request()->is("admin/administracions") || request()->is("admin/administracions/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-check">

                            </i>
                            <p>
                                {{ trans('cruds.administracion.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('financiera_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.financieras.index") }}" class="nav-link {{ request()->is("admin/financieras") || request()->is("admin/financieras/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-calculator">

                            </i>
                            <p>
                                {{ trans('cruds.financiera.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('gestion_humana_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/hojas-de-vidas*") ? "menu-open" : "" }} {{ request()->is("admin/empleos*") ? "menu-open" : "" }} {{ request()->is("admin/sg-ssts*") ? "menu-open" : "" }} {{ request()->is("admin/plan-de-formacions*") ? "menu-open" : "" }} {{ request()->is("admin/evaluacion-de-desempenos*") ? "menu-open" : "" }} {{ request()->is("admin/certificado-laborals*") ? "menu-open" : "" }} {{ request()->is("admin/cerficadodefunciones*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-marker">

                            </i>
                            <p>
                                {{ trans('cruds.gestionHumana.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('hojas_de_vida_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hojas-de-vidas.index") }}" class="nav-link {{ request()->is("admin/hojas-de-vidas") || request()->is("admin/hojas-de-vidas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hojasDeVida.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('empleo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.empleos.index") }}" class="nav-link {{ request()->is("admin/empleos") || request()->is("admin/empleos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-pencil-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.empleo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sg_sst_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sg-ssts.index") }}" class="nav-link {{ request()->is("admin/sg-ssts") || request()->is("admin/sg-ssts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sgSst.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('plan_de_formacion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.plan-de-formacions.index") }}" class="nav-link {{ request()->is("admin/plan-de-formacions") || request()->is("admin/plan-de-formacions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-graduate">

                                        </i>
                                        <p>
                                            {{ trans('cruds.planDeFormacion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evaluacion_de_desempeno_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.evaluacion-de-desempenos.index") }}" class="nav-link {{ request()->is("admin/evaluacion-de-desempenos") || request()->is("admin/evaluacion-de-desempenos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-quidditch">

                                        </i>
                                        <p>
                                            {{ trans('cruds.evaluacionDeDesempeno.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('certificado_laboral_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.certificado-laborals.index") }}" class="nav-link {{ request()->is("admin/certificado-laborals") || request()->is("admin/certificado-laborals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-angle-double-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.certificadoLaboral.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cerficadodefuncione_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cerficadodefunciones.index") }}" class="nav-link {{ request()->is("admin/cerficadodefunciones") || request()->is("admin/cerficadodefunciones/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-angle-double-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cerficadodefuncione.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('postulacione_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/pruebas-psicotecnicas*") ? "menu-open" : "" }} {{ request()->is("admin/candidatos*") ? "menu-open" : "" }} {{ request()->is("admin/documentos-candidatos*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.postulacione.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('pruebas_psicotecnica_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.pruebas-psicotecnicas.index") }}" class="nav-link {{ request()->is("admin/pruebas-psicotecnicas") || request()->is("admin/pruebas-psicotecnicas/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-sync">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.pruebasPsicotecnica.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('candidato_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.candidatos.index") }}" class="nav-link {{ request()->is("admin/candidatos") || request()->is("admin/candidatos/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-user-tie">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.candidato.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('documentos_candidato_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.documentos-candidatos.index") }}" class="nav-link {{ request()->is("admin/documentos-candidatos") || request()->is("admin/documentos-candidatos/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-file-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.documentosCandidato.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('calidad_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.calidads.index") }}" class="nav-link {{ request()->is("admin/calidads") || request()->is("admin/calidads/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-address-card">

                            </i>
                            <p>
                                {{ trans('cruds.calidad.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('admisione_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.admisiones.index") }}" class="nav-link {{ request()->is("admin/admisiones") || request()->is("admin/admisiones/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-graduate">

                            </i>
                            <p>
                                {{ trans('cruds.admisione.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('promocion_institucional_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.promocion-institucionals.index") }}" class="nav-link {{ request()->is("admin/promocion-institucionals") || request()->is("admin/promocion-institucionals/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-tv">

                            </i>
                            <p>
                                {{ trans('cruds.promocionInstitucional.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('convenio_man_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.convenio-men.index") }}" class="nav-link {{ request()->is("admin/convenio-men") || request()->is("admin/convenio-men/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.convenioMan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('sae_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.saes.index") }}" class="nav-link {{ request()->is("admin/saes") || request()->is("admin/saes/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-feather">

                            </i>
                            <p>
                                {{ trans('cruds.sae.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('academica_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.academicas.index") }}" class="nav-link {{ request()->is("admin/academicas") || request()->is("admin/academicas/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-graduation-cap">

                            </i>
                            <p>
                                {{ trans('cruds.academica.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('bienestar_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.bienestars.index") }}" class="nav-link {{ request()->is("admin/bienestars") || request()->is("admin/bienestars/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-allergies">

                            </i>
                            <p>
                                {{ trans('cruds.bienestar.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('biblioteca_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.bibliotecas.index") }}" class="nav-link {{ request()->is("admin/bibliotecas") || request()->is("admin/bibliotecas/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.biblioteca.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('pastoral_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.pastorals.index") }}" class="nav-link {{ request()->is("admin/pastorals") || request()->is("admin/pastorals/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-church">

                            </i>
                            <p>
                                {{ trans('cruds.pastoral.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('sistema_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/componentes*") ? "menu-open" : "" }} {{ request()->is("admin/maintenances*") ? "menu-open" : "" }} {{ request()->is("admin/fichas-tecnicas*") ? "menu-open" : "" }} {{ request()->is("admin/imprimirs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-tv">

                            </i>
                            <p>
                                {{ trans('cruds.sistema.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('componente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.componentes.index") }}" class="nav-link {{ request()->is("admin/componentes") || request()->is("admin/componentes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-check-double">

                                        </i>
                                        <p>
                                            {{ trans('cruds.componente.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('maintenance_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.maintenances.index") }}" class="nav-link {{ request()->is("admin/maintenances") || request()->is("admin/maintenances/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-key">

                                        </i>
                                        <p>
                                            {{ trans('cruds.maintenance.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('fichas_tecnica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.fichas-tecnicas.index") }}" class="nav-link {{ request()->is("admin/fichas-tecnicas") || request()->is("admin/fichas-tecnicas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-atlas">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fichasTecnica.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('imprimir_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.imprimirs.index") }}" class="nav-link {{ request()->is("admin/imprimirs") || request()->is("admin/imprimirs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-print">

                                        </i>
                                        <p>
                                            {{ trans('cruds.imprimir.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('mantenimiento_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/grupos*") ? "menu-open" : "" }} {{ request()->is("admin/ficha-tecnicas*") ? "menu-open" : "" }} {{ request()->is("admin/reparacions*") ? "menu-open" : "" }} {{ request()->is("admin/imprimirmtos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-toolbox">

                            </i>
                            <p>
                                {{ trans('cruds.mantenimiento.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('grupo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.grupos.index") }}" class="nav-link {{ request()->is("admin/grupos") || request()->is("admin/grupos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-object-group">

                                        </i>
                                        <p>
                                            {{ trans('cruds.grupo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ficha_tecnica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ficha-tecnicas.index") }}" class="nav-link {{ request()->is("admin/ficha-tecnicas") || request()->is("admin/ficha-tecnicas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-justify">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fichaTecnica.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reparacion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reparacions.index") }}" class="nav-link {{ request()->is("admin/reparacions") || request()->is("admin/reparacions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.reparacion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('imprimirmto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.imprimirmtos.index") }}" class="nav-link {{ request()->is("admin/imprimirmtos") || request()->is("admin/imprimirmtos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-print">

                                        </i>
                                        <p>
                                            {{ trans('cruds.imprimirmto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('plataforma_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/schoolpacks*") ? "menu-open" : "" }} {{ request()->is("admin/trendis*") ? "menu-open" : "" }} {{ request()->is("admin/progrentis*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-university">

                            </i>
                            <p>
                                {{ trans('cruds.plataforma.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('schoolpack_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.schoolpacks.index") }}" class="nav-link {{ request()->is("admin/schoolpacks") || request()->is("admin/schoolpacks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-school">

                                        </i>
                                        <p>
                                            {{ trans('cruds.schoolpack.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trendi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trendis.index") }}" class="nav-link {{ request()->is("admin/trendis") || request()->is("admin/trendis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.trendi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('progrenti_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.progrentis.index") }}" class="nav-link {{ request()->is("admin/progrentis") || request()->is("admin/progrentis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-award">

                                        </i>
                                        <p>
                                            {{ trans('cruds.progrenti.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('regionalizacion_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/proyectos-articulados*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-bezier-curve">

                            </i>
                            <p>
                                {{ trans('cruds.regionalizacion.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('proyectos_articulado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.proyectos-articulados.index") }}" class="nav-link {{ request()->is("admin/proyectos-articulados") || request()->is("admin/proyectos-articulados/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-r-project">

                                        </i>
                                        <p>
                                            {{ trans('cruds.proyectosArticulado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('help_desk_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tickets*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-question-circle">

                            </i>
                            <p>
                                {{ trans('cruds.helpDesk.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('ticket_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tickets.index") }}" class="nav-link {{ request()->is("admin/tickets") || request()->is("admin/tickets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ticket.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('parametro_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/agentes*") ? "menu-open" : "" }} {{ request()->is("admin/sedes*") ? "menu-open" : "" }} {{ request()->is("admin/prioridads*") ? "menu-open" : "" }} {{ request()->is("admin/incidentes*") ? "menu-open" : "" }} {{ request()->is("admin/estados*") ? "menu-open" : "" }} {{ request()->is("admin/idiomasgestionhumanas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.parametro.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('agente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.agentes.index") }}" class="nav-link {{ request()->is("admin/agentes") || request()->is("admin/agentes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.agente.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sede_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sedes.index") }}" class="nav-link {{ request()->is("admin/sedes") || request()->is("admin/sedes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sede.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('prioridad_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.prioridads.index") }}" class="nav-link {{ request()->is("admin/prioridads") || request()->is("admin/prioridads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-battery-three-quarters">

                                        </i>
                                        <p>
                                            {{ trans('cruds.prioridad.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('incidente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incidentes.index") }}" class="nav-link {{ request()->is("admin/incidentes") || request()->is("admin/incidentes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exclamation-triangle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incidente.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('estado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.estados.index") }}" class="nav-link {{ request()->is("admin/estados") || request()->is("admin/estados/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-archway">

                                        </i>
                                        <p>
                                            {{ trans('cruds.estado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('idiomasgestionhumana_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.idiomasgestionhumanas.index") }}" class="nav-link {{ request()->is("admin/idiomasgestionhumanas") || request()->is("admin/idiomasgestionhumanas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.idiomasgestionhumana.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>