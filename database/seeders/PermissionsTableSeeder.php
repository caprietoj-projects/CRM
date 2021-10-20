<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'agente_create',
            ],
            [
                'id'    => 20,
                'title' => 'agente_edit',
            ],
            [
                'id'    => 21,
                'title' => 'agente_show',
            ],
            [
                'id'    => 22,
                'title' => 'agente_delete',
            ],
            [
                'id'    => 23,
                'title' => 'agente_access',
            ],
            [
                'id'    => 24,
                'title' => 'sede_create',
            ],
            [
                'id'    => 25,
                'title' => 'sede_edit',
            ],
            [
                'id'    => 26,
                'title' => 'sede_show',
            ],
            [
                'id'    => 27,
                'title' => 'sede_delete',
            ],
            [
                'id'    => 28,
                'title' => 'sede_access',
            ],
            [
                'id'    => 29,
                'title' => 'prioridad_create',
            ],
            [
                'id'    => 30,
                'title' => 'prioridad_edit',
            ],
            [
                'id'    => 31,
                'title' => 'prioridad_show',
            ],
            [
                'id'    => 32,
                'title' => 'prioridad_delete',
            ],
            [
                'id'    => 33,
                'title' => 'prioridad_access',
            ],
            [
                'id'    => 34,
                'title' => 'incidente_create',
            ],
            [
                'id'    => 35,
                'title' => 'incidente_edit',
            ],
            [
                'id'    => 36,
                'title' => 'incidente_show',
            ],
            [
                'id'    => 37,
                'title' => 'incidente_delete',
            ],
            [
                'id'    => 38,
                'title' => 'incidente_access',
            ],
            [
                'id'    => 39,
                'title' => 'estado_create',
            ],
            [
                'id'    => 40,
                'title' => 'estado_edit',
            ],
            [
                'id'    => 41,
                'title' => 'estado_show',
            ],
            [
                'id'    => 42,
                'title' => 'estado_delete',
            ],
            [
                'id'    => 43,
                'title' => 'estado_access',
            ],
            [
                'id'    => 44,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 45,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 46,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 47,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 48,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 49,
                'title' => 'parametro_access',
            ],
            [
                'id'    => 50,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 51,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 52,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 54,
                'title' => 'sistema_access',
            ],
            [
                'id'    => 55,
                'title' => 'fichas_tecnica_create',
            ],
            [
                'id'    => 56,
                'title' => 'fichas_tecnica_edit',
            ],
            [
                'id'    => 57,
                'title' => 'fichas_tecnica_show',
            ],
            [
                'id'    => 58,
                'title' => 'fichas_tecnica_delete',
            ],
            [
                'id'    => 59,
                'title' => 'fichas_tecnica_access',
            ],
            [
                'id'    => 60,
                'title' => 'imprimir_create',
            ],
            [
                'id'    => 61,
                'title' => 'imprimir_edit',
            ],
            [
                'id'    => 62,
                'title' => 'imprimir_show',
            ],
            [
                'id'    => 63,
                'title' => 'imprimir_delete',
            ],
            [
                'id'    => 64,
                'title' => 'imprimir_access',
            ],
            [
                'id'    => 65,
                'title' => 'componente_create',
            ],
            [
                'id'    => 66,
                'title' => 'componente_edit',
            ],
            [
                'id'    => 67,
                'title' => 'componente_show',
            ],
            [
                'id'    => 68,
                'title' => 'componente_delete',
            ],
            [
                'id'    => 69,
                'title' => 'componente_access',
            ],
            [
                'id'    => 70,
                'title' => 'mantenimiento_access',
            ],
            [
                'id'    => 71,
                'title' => 'imprimirmto_create',
            ],
            [
                'id'    => 72,
                'title' => 'imprimirmto_edit',
            ],
            [
                'id'    => 73,
                'title' => 'imprimirmto_show',
            ],
            [
                'id'    => 74,
                'title' => 'imprimirmto_delete',
            ],
            [
                'id'    => 75,
                'title' => 'imprimirmto_access',
            ],
            [
                'id'    => 76,
                'title' => 'help_desk_access',
            ],
            [
                'id'    => 77,
                'title' => 'maintenance_create',
            ],
            [
                'id'    => 78,
                'title' => 'maintenance_edit',
            ],
            [
                'id'    => 79,
                'title' => 'maintenance_show',
            ],
            [
                'id'    => 80,
                'title' => 'maintenance_delete',
            ],
            [
                'id'    => 81,
                'title' => 'maintenance_access',
            ],
            [
                'id'    => 82,
                'title' => 'atencion_al_usuario_create',
            ],
            [
                'id'    => 83,
                'title' => 'atencion_al_usuario_edit',
            ],
            [
                'id'    => 84,
                'title' => 'atencion_al_usuario_show',
            ],
            [
                'id'    => 85,
                'title' => 'atencion_al_usuario_delete',
            ],
            [
                'id'    => 86,
                'title' => 'atencion_al_usuario_access',
            ],
            [
                'id'    => 87,
                'title' => 'grupo_create',
            ],
            [
                'id'    => 88,
                'title' => 'grupo_edit',
            ],
            [
                'id'    => 89,
                'title' => 'grupo_show',
            ],
            [
                'id'    => 90,
                'title' => 'grupo_delete',
            ],
            [
                'id'    => 91,
                'title' => 'grupo_access',
            ],
            [
                'id'    => 92,
                'title' => 'ficha_tecnica_create',
            ],
            [
                'id'    => 93,
                'title' => 'ficha_tecnica_edit',
            ],
            [
                'id'    => 94,
                'title' => 'ficha_tecnica_show',
            ],
            [
                'id'    => 95,
                'title' => 'ficha_tecnica_delete',
            ],
            [
                'id'    => 96,
                'title' => 'ficha_tecnica_access',
            ],
            [
                'id'    => 97,
                'title' => 'reparacion_create',
            ],
            [
                'id'    => 98,
                'title' => 'reparacion_edit',
            ],
            [
                'id'    => 99,
                'title' => 'reparacion_show',
            ],
            [
                'id'    => 100,
                'title' => 'reparacion_delete',
            ],
            [
                'id'    => 101,
                'title' => 'reparacion_access',
            ],
            [
                'id'    => 102,
                'title' => 'financiera_create',
            ],
            [
                'id'    => 103,
                'title' => 'financiera_edit',
            ],
            [
                'id'    => 104,
                'title' => 'financiera_show',
            ],
            [
                'id'    => 105,
                'title' => 'financiera_delete',
            ],
            [
                'id'    => 106,
                'title' => 'financiera_access',
            ],
            [
                'id'    => 107,
                'title' => 'administracion_create',
            ],
            [
                'id'    => 108,
                'title' => 'administracion_edit',
            ],
            [
                'id'    => 109,
                'title' => 'administracion_show',
            ],
            [
                'id'    => 110,
                'title' => 'administracion_delete',
            ],
            [
                'id'    => 111,
                'title' => 'administracion_access',
            ],
            [
                'id'    => 112,
                'title' => 'calidad_create',
            ],
            [
                'id'    => 113,
                'title' => 'calidad_edit',
            ],
            [
                'id'    => 114,
                'title' => 'calidad_show',
            ],
            [
                'id'    => 115,
                'title' => 'calidad_delete',
            ],
            [
                'id'    => 116,
                'title' => 'calidad_access',
            ],
            [
                'id'    => 117,
                'title' => 'admisione_create',
            ],
            [
                'id'    => 118,
                'title' => 'admisione_edit',
            ],
            [
                'id'    => 119,
                'title' => 'admisione_show',
            ],
            [
                'id'    => 120,
                'title' => 'admisione_delete',
            ],
            [
                'id'    => 121,
                'title' => 'admisione_access',
            ],
            [
                'id'    => 122,
                'title' => 'promocion_institucional_create',
            ],
            [
                'id'    => 123,
                'title' => 'promocion_institucional_edit',
            ],
            [
                'id'    => 124,
                'title' => 'promocion_institucional_show',
            ],
            [
                'id'    => 125,
                'title' => 'promocion_institucional_delete',
            ],
            [
                'id'    => 126,
                'title' => 'promocion_institucional_access',
            ],
            [
                'id'    => 127,
                'title' => 'convenio_man_create',
            ],
            [
                'id'    => 128,
                'title' => 'convenio_man_edit',
            ],
            [
                'id'    => 129,
                'title' => 'convenio_man_show',
            ],
            [
                'id'    => 130,
                'title' => 'convenio_man_delete',
            ],
            [
                'id'    => 131,
                'title' => 'convenio_man_access',
            ],
            [
                'id'    => 132,
                'title' => 'sae_create',
            ],
            [
                'id'    => 133,
                'title' => 'sae_edit',
            ],
            [
                'id'    => 134,
                'title' => 'sae_show',
            ],
            [
                'id'    => 135,
                'title' => 'sae_delete',
            ],
            [
                'id'    => 136,
                'title' => 'sae_access',
            ],
            [
                'id'    => 137,
                'title' => 'bienestar_create',
            ],
            [
                'id'    => 138,
                'title' => 'bienestar_edit',
            ],
            [
                'id'    => 139,
                'title' => 'bienestar_show',
            ],
            [
                'id'    => 140,
                'title' => 'bienestar_delete',
            ],
            [
                'id'    => 141,
                'title' => 'bienestar_access',
            ],
            [
                'id'    => 142,
                'title' => 'biblioteca_create',
            ],
            [
                'id'    => 143,
                'title' => 'biblioteca_edit',
            ],
            [
                'id'    => 144,
                'title' => 'biblioteca_show',
            ],
            [
                'id'    => 145,
                'title' => 'biblioteca_delete',
            ],
            [
                'id'    => 146,
                'title' => 'biblioteca_access',
            ],
            [
                'id'    => 147,
                'title' => 'pastoral_create',
            ],
            [
                'id'    => 148,
                'title' => 'pastoral_edit',
            ],
            [
                'id'    => 149,
                'title' => 'pastoral_show',
            ],
            [
                'id'    => 150,
                'title' => 'pastoral_delete',
            ],
            [
                'id'    => 151,
                'title' => 'pastoral_access',
            ],
            [
                'id'    => 152,
                'title' => 'academica_create',
            ],
            [
                'id'    => 153,
                'title' => 'academica_edit',
            ],
            [
                'id'    => 154,
                'title' => 'academica_show',
            ],
            [
                'id'    => 155,
                'title' => 'academica_delete',
            ],
            [
                'id'    => 156,
                'title' => 'academica_access',
            ],
            [
                'id'    => 157,
                'title' => 'plataforma_access',
            ],
            [
                'id'    => 158,
                'title' => 'schoolpack_create',
            ],
            [
                'id'    => 159,
                'title' => 'schoolpack_edit',
            ],
            [
                'id'    => 160,
                'title' => 'schoolpack_show',
            ],
            [
                'id'    => 161,
                'title' => 'schoolpack_delete',
            ],
            [
                'id'    => 162,
                'title' => 'schoolpack_access',
            ],
            [
                'id'    => 163,
                'title' => 'trendi_create',
            ],
            [
                'id'    => 164,
                'title' => 'trendi_edit',
            ],
            [
                'id'    => 165,
                'title' => 'trendi_show',
            ],
            [
                'id'    => 166,
                'title' => 'trendi_delete',
            ],
            [
                'id'    => 167,
                'title' => 'trendi_access',
            ],
            [
                'id'    => 168,
                'title' => 'progrenti_create',
            ],
            [
                'id'    => 169,
                'title' => 'progrenti_edit',
            ],
            [
                'id'    => 170,
                'title' => 'progrenti_show',
            ],
            [
                'id'    => 171,
                'title' => 'progrenti_delete',
            ],
            [
                'id'    => 172,
                'title' => 'progrenti_access',
            ],
            [
                'id'    => 173,
                'title' => 'rectorium_access',
            ],
            [
                'id'    => 174,
                'title' => 'cumpleano_create',
            ],
            [
                'id'    => 175,
                'title' => 'cumpleano_edit',
            ],
            [
                'id'    => 176,
                'title' => 'cumpleano_show',
            ],
            [
                'id'    => 177,
                'title' => 'cumpleano_delete',
            ],
            [
                'id'    => 178,
                'title' => 'cumpleano_access',
            ],
            [
                'id'    => 179,
                'title' => 'regionalizacion_access',
            ],
            [
                'id'    => 180,
                'title' => 'proyectos_articulado_create',
            ],
            [
                'id'    => 181,
                'title' => 'proyectos_articulado_edit',
            ],
            [
                'id'    => 182,
                'title' => 'proyectos_articulado_show',
            ],
            [
                'id'    => 183,
                'title' => 'proyectos_articulado_delete',
            ],
            [
                'id'    => 184,
                'title' => 'proyectos_articulado_access',
            ],
            [
                'id'    => 185,
                'title' => 'empleo_create',
            ],
            [
                'id'    => 186,
                'title' => 'empleo_edit',
            ],
            [
                'id'    => 187,
                'title' => 'empleo_show',
            ],
            [
                'id'    => 188,
                'title' => 'empleo_delete',
            ],
            [
                'id'    => 189,
                'title' => 'empleo_access',
            ],
            [
                'id'    => 190,
                'title' => 'gestion_humana_access',
            ],
            [
                'id'    => 191,
                'title' => 'sg_sst_create',
            ],
            [
                'id'    => 192,
                'title' => 'sg_sst_edit',
            ],
            [
                'id'    => 193,
                'title' => 'sg_sst_show',
            ],
            [
                'id'    => 194,
                'title' => 'sg_sst_delete',
            ],
            [
                'id'    => 195,
                'title' => 'sg_sst_access',
            ],
            [
                'id'    => 196,
                'title' => 'plan_de_formacion_create',
            ],
            [
                'id'    => 197,
                'title' => 'plan_de_formacion_edit',
            ],
            [
                'id'    => 198,
                'title' => 'plan_de_formacion_show',
            ],
            [
                'id'    => 199,
                'title' => 'plan_de_formacion_delete',
            ],
            [
                'id'    => 200,
                'title' => 'plan_de_formacion_access',
            ],
            [
                'id'    => 201,
                'title' => 'evaluacion_de_desempeno_create',
            ],
            [
                'id'    => 202,
                'title' => 'evaluacion_de_desempeno_edit',
            ],
            [
                'id'    => 203,
                'title' => 'evaluacion_de_desempeno_show',
            ],
            [
                'id'    => 204,
                'title' => 'evaluacion_de_desempeno_delete',
            ],
            [
                'id'    => 205,
                'title' => 'evaluacion_de_desempeno_access',
            ],
            [
                'id'    => 206,
                'title' => 'hojas_de_vida_create',
            ],
            [
                'id'    => 207,
                'title' => 'hojas_de_vida_edit',
            ],
            [
                'id'    => 208,
                'title' => 'hojas_de_vida_show',
            ],
            [
                'id'    => 209,
                'title' => 'hojas_de_vida_delete',
            ],
            [
                'id'    => 210,
                'title' => 'hojas_de_vida_access',
            ],
            [
                'id'    => 211,
                'title' => 'certificado_laboral_create',
            ],
            [
                'id'    => 212,
                'title' => 'certificado_laboral_edit',
            ],
            [
                'id'    => 213,
                'title' => 'certificado_laboral_show',
            ],
            [
                'id'    => 214,
                'title' => 'certificado_laboral_delete',
            ],
            [
                'id'    => 215,
                'title' => 'certificado_laboral_access',
            ],
            [
                'id'    => 216,
                'title' => 'cerficadodefuncione_create',
            ],
            [
                'id'    => 217,
                'title' => 'cerficadodefuncione_edit',
            ],
            [
                'id'    => 218,
                'title' => 'cerficadodefuncione_show',
            ],
            [
                'id'    => 219,
                'title' => 'cerficadodefuncione_delete',
            ],
            [
                'id'    => 220,
                'title' => 'cerficadodefuncione_access',
            ],
            [
                'id'    => 221,
                'title' => 'postulacione_access',
            ],
            [
                'id'    => 222,
                'title' => 'pruebas_psicotecnica_create',
            ],
            [
                'id'    => 223,
                'title' => 'pruebas_psicotecnica_edit',
            ],
            [
                'id'    => 224,
                'title' => 'pruebas_psicotecnica_show',
            ],
            [
                'id'    => 225,
                'title' => 'pruebas_psicotecnica_delete',
            ],
            [
                'id'    => 226,
                'title' => 'pruebas_psicotecnica_access',
            ],
            [
                'id'    => 227,
                'title' => 'candidato_create',
            ],
            [
                'id'    => 228,
                'title' => 'candidato_edit',
            ],
            [
                'id'    => 229,
                'title' => 'candidato_show',
            ],
            [
                'id'    => 230,
                'title' => 'candidato_delete',
            ],
            [
                'id'    => 231,
                'title' => 'candidato_access',
            ],
            [
                'id'    => 232,
                'title' => 'documentos_candidato_create',
            ],
            [
                'id'    => 233,
                'title' => 'documentos_candidato_edit',
            ],
            [
                'id'    => 234,
                'title' => 'documentos_candidato_show',
            ],
            [
                'id'    => 235,
                'title' => 'documentos_candidato_delete',
            ],
            [
                'id'    => 236,
                'title' => 'documentos_candidato_access',
            ],
            [
                'id'    => 237,
                'title' => 'idiomasgestionhumana_create',
            ],
            [
                'id'    => 238,
                'title' => 'idiomasgestionhumana_edit',
            ],
            [
                'id'    => 239,
                'title' => 'idiomasgestionhumana_show',
            ],
            [
                'id'    => 240,
                'title' => 'idiomasgestionhumana_delete',
            ],
            [
                'id'    => 241,
                'title' => 'idiomasgestionhumana_access',
            ],
            [
                'id'    => 242,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
