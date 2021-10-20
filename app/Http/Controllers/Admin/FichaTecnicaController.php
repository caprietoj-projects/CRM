<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFichaTecnicaRequest;
use App\Http\Requests\StoreFichaTecnicaRequest;
use App\Http\Requests\UpdateFichaTecnicaRequest;
use App\Models\Agente;
use App\Models\FichaTecnica;
use App\Models\Grupo;
use App\Models\Sede;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FichaTecnicaController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('ficha_tecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FichaTecnica::with(['grupo', 'ubicacion', 'encargado', 'created_by'])->select(sprintf('%s.*', (new FichaTecnica())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'ficha_tecnica_show';
                $editGate = 'ficha_tecnica_edit';
                $deleteGate = 'ficha_tecnica_delete';
                $crudRoutePart = 'ficha-tecnicas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : '';
            });
            $table->addColumn('grupo_nombre', function ($row) {
                return $row->grupo ? $row->grupo->nombre : '';
            });

            $table->editColumn('modelo', function ($row) {
                return $row->modelo ? $row->modelo : '';
            });
            $table->editColumn('serial', function ($row) {
                return $row->serial ? $row->serial : '';
            });
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });
            $table->editColumn('tipo', function ($row) {
                return $row->tipo ? $row->tipo : '';
            });
            $table->addColumn('ubicacion_sede', function ($row) {
                return $row->ubicacion ? $row->ubicacion->sede : '';
            });

            $table->addColumn('encargado_nombre', function ($row) {
                return $row->encargado ? $row->encargado->nombre : '';
            });

            $table->editColumn('encargado.cargo', function ($row) {
                return $row->encargado ? (is_string($row->encargado) ? $row->encargado : $row->encargado->cargo) : '';
            });
            $table->editColumn('encargado.correo', function ($row) {
                return $row->encargado ? (is_string($row->encargado) ? $row->encargado : $row->encargado->correo) : '';
            });
            $table->editColumn('foto', function ($row) {
                if ($photo = $row->foto) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'grupo', 'ubicacion', 'encargado', 'foto']);

            return $table->make(true);
        }

        return view('admin.fichaTecnicas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ficha_tecnica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ubicacions = Sede::pluck('sede', 'id')->prepend(trans('global.pleaseSelect'), '');

        $encargados = Agente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fichaTecnicas.create', compact('grupos', 'ubicacions', 'encargados'));
    }

    public function store(StoreFichaTecnicaRequest $request)
    {
        $fichaTecnica = FichaTecnica::create($request->all());

        if ($request->input('foto', false)) {
            $fichaTecnica->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fichaTecnica->id]);
        }

        return redirect()->route('admin.ficha-tecnicas.index');
    }

    public function edit(FichaTecnica $fichaTecnica)
    {
        abort_if(Gate::denies('ficha_tecnica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ubicacions = Sede::pluck('sede', 'id')->prepend(trans('global.pleaseSelect'), '');

        $encargados = Agente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fichaTecnica->load('grupo', 'ubicacion', 'encargado', 'created_by');

        return view('admin.fichaTecnicas.edit', compact('grupos', 'ubicacions', 'encargados', 'fichaTecnica'));
    }

    public function update(UpdateFichaTecnicaRequest $request, FichaTecnica $fichaTecnica)
    {
        $fichaTecnica->update($request->all());

        if ($request->input('foto', false)) {
            if (!$fichaTecnica->foto || $request->input('foto') !== $fichaTecnica->foto->file_name) {
                if ($fichaTecnica->foto) {
                    $fichaTecnica->foto->delete();
                }
                $fichaTecnica->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
            }
        } elseif ($fichaTecnica->foto) {
            $fichaTecnica->foto->delete();
        }

        return redirect()->route('admin.ficha-tecnicas.index');
    }

    public function show(FichaTecnica $fichaTecnica)
    {
        abort_if(Gate::denies('ficha_tecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichaTecnica->load('grupo', 'ubicacion', 'encargado', 'created_by', 'activoReparacions');

        return view('admin.fichaTecnicas.show', compact('fichaTecnica'));
    }

    public function destroy(FichaTecnica $fichaTecnica)
    {
        abort_if(Gate::denies('ficha_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichaTecnica->delete();

        return back();
    }

    public function massDestroy(MassDestroyFichaTecnicaRequest $request)
    {
        FichaTecnica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ficha_tecnica_create') && Gate::denies('ficha_tecnica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FichaTecnica();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
