<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Maintenance',
            'date_field' => 'fecha',
            'field'      => 'tipo',
            'prefix'     => '',
            'suffix'     => 'Mantenimiento',
            'route'      => 'admin.maintenances.edit',
        ],
        [
            'model'      => '\App\Models\Reparacion',
            'date_field' => 'fecha',
            'field'      => 'fecha',
            'prefix'     => '',
            'suffix'     => 'Reparación',
            'route'      => 'admin.reparacions.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
