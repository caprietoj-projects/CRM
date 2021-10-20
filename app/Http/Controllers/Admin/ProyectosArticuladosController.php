<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProyectosArticuladoRequest;
use App\Http\Requests\StoreProyectosArticuladoRequest;
use App\Http\Requests\UpdateProyectosArticuladoRequest;
use App\Models\ProyectosArticulado;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProyectosArticuladosController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('proyectos_articulado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProyectosArticulado::with(['created_by'])->select(sprintf('%s.*', (new ProyectosArticulado())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'proyectos_articulado_show';
                $editGate = 'proyectos_articulado_edit';
                $deleteGate = 'proyectos_articulado_delete';
                $crudRoutePart = 'proyectos-articulados';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('nombre_del_estudiante', function ($row) {
                return $row->nombre_del_estudiante ? $row->nombre_del_estudiante : '';
            });
            $table->editColumn('curso', function ($row) {
                return $row->curso ? $row->curso : '';
            });
            $table->editColumn('tema_del_proyecto', function ($row) {
                return $row->tema_del_proyecto ? $row->tema_del_proyecto : '';
            });
            $table->editColumn('proyecto', function ($row) {
                return $row->proyecto ? '<a href="' . $row->proyecto->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'proyecto']);

            return $table->make(true);
        }

        return view('admin.proyectosArticulados.index');
    }

    public function create()
    {
        abort_if(Gate::denies('proyectos_articulado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proyectosArticulados.create');
    }

    public function store(StoreProyectosArticuladoRequest $request)
    {
        $proyectosArticulado = ProyectosArticulado::create($request->all());

        if ($request->input('proyecto', false)) {
            $proyectosArticulado->addMedia(storage_path('tmp/uploads/' . basename($request->input('proyecto'))))->toMediaCollection('proyecto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proyectosArticulado->id]);
        }

        return redirect()->route('admin.proyectos-articulados.index');
    }

    public function edit(ProyectosArticulado $proyectosArticulado)
    {
        abort_if(Gate::denies('proyectos_articulado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectosArticulado->load('created_by');

        return view('admin.proyectosArticulados.edit', compact('proyectosArticulado'));
    }

    public function update(UpdateProyectosArticuladoRequest $request, ProyectosArticulado $proyectosArticulado)
    {
        $proyectosArticulado->update($request->all());

        if ($request->input('proyecto', false)) {
            if (!$proyectosArticulado->proyecto || $request->input('proyecto') !== $proyectosArticulado->proyecto->file_name) {
                if ($proyectosArticulado->proyecto) {
                    $proyectosArticulado->proyecto->delete();
                }
                $proyectosArticulado->addMedia(storage_path('tmp/uploads/' . basename($request->input('proyecto'))))->toMediaCollection('proyecto');
            }
        } elseif ($proyectosArticulado->proyecto) {
            $proyectosArticulado->proyecto->delete();
        }

        return redirect()->route('admin.proyectos-articulados.index');
    }

    public function show(ProyectosArticulado $proyectosArticulado)
    {
        abort_if(Gate::denies('proyectos_articulado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectosArticulado->load('created_by');

        return view('admin.proyectosArticulados.show', compact('proyectosArticulado'));
    }

    public function destroy(ProyectosArticulado $proyectosArticulado)
    {
        abort_if(Gate::denies('proyectos_articulado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectosArticulado->delete();

        return back();
    }

    public function massDestroy(MassDestroyProyectosArticuladoRequest $request)
    {
        ProyectosArticulado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('proyectos_articulado_create') && Gate::denies('proyectos_articulado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProyectosArticulado();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
