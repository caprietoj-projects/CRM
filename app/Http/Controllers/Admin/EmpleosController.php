<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmpleoRequest;
use App\Http\Requests\StoreEmpleoRequest;
use App\Http\Requests\UpdateEmpleoRequest;
use App\Models\Empleo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmpleosController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('empleo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Empleo::with(['created_by'])->select(sprintf('%s.*', (new Empleo())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'empleo_show';
                $editGate = 'empleo_edit';
                $deleteGate = 'empleo_delete';
                $crudRoutePart = 'empleos';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('vacante', function ($row) {
                return $row->vacante ? $row->vacante : '';
            });
            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : '';
            });
            $table->editColumn('tiempo', function ($row) {
                return $row->tiempo ? $row->tiempo : '';
            });
            $table->editColumn('salario', function ($row) {
                return $row->salario ? $row->salario : '';
            });
            $table->editColumn('empresa', function ($row) {
                return $row->empresa ? $row->empresa : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.empleos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('empleo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.empleos.create');
    }

    public function store(StoreEmpleoRequest $request)
    {
        $empleo = Empleo::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $empleo->id]);
        }

        return redirect()->route('admin.empleos.index');
    }

    public function edit(Empleo $empleo)
    {
        abort_if(Gate::denies('empleo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleo->load('created_by');

        return view('admin.empleos.edit', compact('empleo'));
    }

    public function update(UpdateEmpleoRequest $request, Empleo $empleo)
    {
        $empleo->update($request->all());

        return redirect()->route('admin.empleos.index');
    }

    public function show(Empleo $empleo)
    {
        abort_if(Gate::denies('empleo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleo->load('created_by');

        return view('admin.empleos.show', compact('empleo'));
    }

    public function destroy(Empleo $empleo)
    {
        abort_if(Gate::denies('empleo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleo->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmpleoRequest $request)
    {
        Empleo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('empleo_create') && Gate::denies('empleo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Empleo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
