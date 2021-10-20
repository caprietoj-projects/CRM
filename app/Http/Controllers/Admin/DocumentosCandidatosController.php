<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentosCandidatoRequest;
use App\Http\Requests\StoreDocumentosCandidatoRequest;
use App\Http\Requests\UpdateDocumentosCandidatoRequest;
use App\Models\DocumentosCandidato;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DocumentosCandidatosController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('documentos_candidato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DocumentosCandidato::with(['created_by'])->select(sprintf('%s.*', (new DocumentosCandidato())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'documentos_candidato_show';
                $editGate = 'documentos_candidato_edit';
                $deleteGate = 'documentos_candidato_delete';
                $crudRoutePart = 'documentos-candidatos';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_de_cedula', function ($row) {
                return $row->no_de_cedula ? $row->no_de_cedula : '';
            });
            $table->editColumn('fotocopia_de_la_cedula', function ($row) {
                if (!$row->fotocopia_de_la_cedula) {
                    return '';
                }
                $links = [];
                foreach ($row->fotocopia_de_la_cedula as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('acta_de_grado', function ($row) {
                if (!$row->acta_de_grado) {
                    return '';
                }
                $links = [];
                foreach ($row->acta_de_grado as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'fotocopia_de_la_cedula', 'acta_de_grado']);

            return $table->make(true);
        }

        return view('admin.documentosCandidatos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('documentos_candidato_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosCandidatos.create');
    }

    public function store(StoreDocumentosCandidatoRequest $request)
    {
        $documentosCandidato = DocumentosCandidato::create($request->all());

        foreach ($request->input('fotocopia_de_la_cedula', []) as $file) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fotocopia_de_la_cedula');
        }

        foreach ($request->input('acta_de_grado', []) as $file) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('acta_de_grado');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentosCandidato->id]);
        }

        return redirect()->route('admin.documentos-candidatos.index');
    }

    public function edit(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosCandidato->load('created_by');

        return view('admin.documentosCandidatos.edit', compact('documentosCandidato'));
    }

    public function update(UpdateDocumentosCandidatoRequest $request, DocumentosCandidato $documentosCandidato)
    {
        $documentosCandidato->update($request->all());

        if (count($documentosCandidato->fotocopia_de_la_cedula) > 0) {
            foreach ($documentosCandidato->fotocopia_de_la_cedula as $media) {
                if (!in_array($media->file_name, $request->input('fotocopia_de_la_cedula', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentosCandidato->fotocopia_de_la_cedula->pluck('file_name')->toArray();
        foreach ($request->input('fotocopia_de_la_cedula', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fotocopia_de_la_cedula');
            }
        }

        if (count($documentosCandidato->acta_de_grado) > 0) {
            foreach ($documentosCandidato->acta_de_grado as $media) {
                if (!in_array($media->file_name, $request->input('acta_de_grado', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentosCandidato->acta_de_grado->pluck('file_name')->toArray();
        foreach ($request->input('acta_de_grado', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('acta_de_grado');
            }
        }

        return redirect()->route('admin.documentos-candidatos.index');
    }

    public function show(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosCandidato->load('created_by');

        return view('admin.documentosCandidatos.show', compact('documentosCandidato'));
    }

    public function destroy(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosCandidato->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentosCandidatoRequest $request)
    {
        DocumentosCandidato::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documentos_candidato_create') && Gate::denies('documentos_candidato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentosCandidato();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
