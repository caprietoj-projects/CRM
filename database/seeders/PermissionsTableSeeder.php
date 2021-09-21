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
                'title' => 'hojas_de_vida_mantenimiento_create',
            ],
            [
                'id'    => 77,
                'title' => 'hojas_de_vida_mantenimiento_edit',
            ],
            [
                'id'    => 78,
                'title' => 'hojas_de_vida_mantenimiento_show',
            ],
            [
                'id'    => 79,
                'title' => 'hojas_de_vida_mantenimiento_delete',
            ],
            [
                'id'    => 80,
                'title' => 'hojas_de_vida_mantenimiento_access',
            ],
            [
                'id'    => 81,
                'title' => 'help_desk_access',
            ],
            [
                'id'    => 82,
                'title' => 'gestion_humana_access',
            ],
            [
                'id'    => 83,
                'title' => 'empleo_create',
            ],
            [
                'id'    => 84,
                'title' => 'empleo_edit',
            ],
            [
                'id'    => 85,
                'title' => 'empleo_show',
            ],
            [
                'id'    => 86,
                'title' => 'empleo_delete',
            ],
            [
                'id'    => 87,
                'title' => 'empleo_access',
            ],
            [
                'id'    => 88,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
