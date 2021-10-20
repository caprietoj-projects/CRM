<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyReparacionRequest;
use App\Http\Requests\StoreReparacionRequest;
use App\Http\Requests\UpdateReparacionRequest;
use App\Models\FichaTecnica;
use App\Models\Reparacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReparacionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('reparacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Reparacion::with(['activo', 'created_by'])->select(sprintf('%s.*', (new Reparacion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reparacion_show';
                $editGate = 'reparacion_edit';
                $deleteGate = 'reparacion_delete';
                $crudRoutePart = 'reparacions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->addColumn('activo_descripcion', function ($row) {
                return $row->activo ? $row->activo->descripcion : '';
            });

            $table->editColumn('activo.modelo', function ($row) {
                return $row->activo ? (is_string($row->activo) ? $row->activo : $row->activo->modelo) : '';
            });
            $table->editColumn('activo.serial', function ($row) {
                return $row->activo ? (is_string($row->activo) ? $row->activo : $row->activo->serial) : '';
            });
            $table->editColumn('activo.color', function ($row) {
                return $row->activo ? (is_string($row->activo) ? $row->activo : $row->activo->color) : '';
            });
            $table->editColumn('activo.tipo', function ($row) {
                return $row->activo ? (is_string($row->activo) ? $row->activo : $row->activo->tipo) : '';
            });
            $table->editColumn('tipo', function ($row) {
                return $row->tipo ? Reparacion::TIPO_SELECT[$row->tipo] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'activo']);

            return $table->make(true);
        }

        return view('admin.reparacions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reparacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activos = FichaTecnica::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reparacions.create', compact('activos'));
    }

    public function store(StoreReparacionRequest $request)
    {
        $reparacion = Reparacion::create($request->all());

        return redirect()->route('admin.reparacions.index');
    }

    public function edit(Reparacion $reparacion)
    {
        abort_if(Gate::denies('reparacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activos = FichaTecnica::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reparacion->load('activo', 'created_by');

        return view('admin.reparacions.edit', compact('activos', 'reparacion'));
    }

    public function update(UpdateReparacionRequest $request, Reparacion $reparacion)
    {
        $reparacion->update($request->all());

        return redirect()->route('admin.reparacions.index');
    }

    public function show(Reparacion $reparacion)
    {
        abort_if(Gate::denies('reparacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reparacion->load('activo', 'created_by');

        return view('admin.reparacions.show', compact('reparacion'));
    }

    public function destroy(Reparacion $reparacion)
    {
        abort_if(Gate::denies('reparacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reparacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyReparacionRequest $request)
    {
        Reparacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
