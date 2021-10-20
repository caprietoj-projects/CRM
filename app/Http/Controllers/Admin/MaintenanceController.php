<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMaintenanceRequest;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\Agente;
use App\Models\FichasTecnica;
use App\Models\Maintenance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MaintenanceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('maintenance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Maintenance::with(['area', 'quien_lo_realiza', 'created_by'])->select(sprintf('%s.*', (new Maintenance())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'maintenance_show';
                $editGate = 'maintenance_edit';
                $deleteGate = 'maintenance_delete';
                $crudRoutePart = 'maintenances';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->addColumn('area_encargado', function ($row) {
                return $row->area ? $row->area->encargado : '';
            });

            $table->editColumn('area.modelo', function ($row) {
                return $row->area ? (is_string($row->area) ? $row->area : $row->area->modelo) : '';
            });
            $table->editColumn('area.serial', function ($row) {
                return $row->area ? (is_string($row->area) ? $row->area : $row->area->serial) : '';
            });
            $table->editColumn('tipo', function ($row) {
                return $row->tipo ? Maintenance::TIPO_SELECT[$row->tipo] : '';
            });
            $table->addColumn('quien_lo_realiza_nombre', function ($row) {
                return $row->quien_lo_realiza ? $row->quien_lo_realiza->nombre : '';
            });

            $table->editColumn('quien_lo_realiza.cargo', function ($row) {
                return $row->quien_lo_realiza ? (is_string($row->quien_lo_realiza) ? $row->quien_lo_realiza : $row->quien_lo_realiza->cargo) : '';
            });
            $table->editColumn('quien_lo_realiza.correo', function ($row) {
                return $row->quien_lo_realiza ? (is_string($row->quien_lo_realiza) ? $row->quien_lo_realiza : $row->quien_lo_realiza->correo) : '';
            });

            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'area', 'quien_lo_realiza']);

            return $table->make(true);
        }

        return view('admin.maintenances.index');
    }

    public function create()
    {
        abort_if(Gate::denies('maintenance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = FichasTecnica::pluck('encargado', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quien_lo_realizas = Agente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.maintenances.create', compact('areas', 'quien_lo_realizas'));
    }

    public function store(StoreMaintenanceRequest $request)
    {
        $maintenance = Maintenance::create($request->all());

        return redirect()->route('admin.maintenances.index');
    }

    public function edit(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = FichasTecnica::pluck('encargado', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quien_lo_realizas = Agente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $maintenance->load('area', 'quien_lo_realiza', 'created_by');

        return view('admin.maintenances.edit', compact('areas', 'quien_lo_realizas', 'maintenance'));
    }

    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->all());

        return redirect()->route('admin.maintenances.index');
    }

    public function show(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenance->load('area', 'quien_lo_realiza', 'created_by');

        return view('admin.maintenances.show', compact('maintenance'));
    }

    public function destroy(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenance->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaintenanceRequest $request)
    {
        Maintenance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
