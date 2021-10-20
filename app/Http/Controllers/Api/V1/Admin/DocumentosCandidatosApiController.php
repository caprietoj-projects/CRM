<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentosCandidatoRequest;
use App\Http\Requests\UpdateDocumentosCandidatoRequest;
use App\Http\Resources\Admin\DocumentosCandidatoResource;
use App\Models\DocumentosCandidato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosCandidatosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_candidato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosCandidatoResource(DocumentosCandidato::with(['created_by'])->get());
    }

    public function store(StoreDocumentosCandidatoRequest $request)
    {
        $documentosCandidato = DocumentosCandidato::create($request->all());

        if ($request->input('fotocopia_de_la_cedula', false)) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($request->input('fotocopia_de_la_cedula'))))->toMediaCollection('fotocopia_de_la_cedula');
        }

        if ($request->input('acta_de_grado', false)) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($request->input('acta_de_grado'))))->toMediaCollection('acta_de_grado');
        }

        return (new DocumentosCandidatoResource($documentosCandidato))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosCandidatoResource($documentosCandidato->load(['created_by']));
    }

    public function update(UpdateDocumentosCandidatoRequest $request, DocumentosCandidato $documentosCandidato)
    {
        $documentosCandidato->update($request->all());

        if ($request->input('fotocopia_de_la_cedula', false)) {
            if (!$documentosCandidato->fotocopia_de_la_cedula || $request->input('fotocopia_de_la_cedula') !== $documentosCandidato->fotocopia_de_la_cedula->file_name) {
                if ($documentosCandidato->fotocopia_de_la_cedula) {
                    $documentosCandidato->fotocopia_de_la_cedula->delete();
                }
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($request->input('fotocopia_de_la_cedula'))))->toMediaCollection('fotocopia_de_la_cedula');
            }
        } elseif ($documentosCandidato->fotocopia_de_la_cedula) {
            $documentosCandidato->fotocopia_de_la_cedula->delete();
        }

        if ($request->input('acta_de_grado', false)) {
            if (!$documentosCandidato->acta_de_grado || $request->input('acta_de_grado') !== $documentosCandidato->acta_de_grado->file_name) {
                if ($documentosCandidato->acta_de_grado) {
                    $documentosCandidato->acta_de_grado->delete();
                }
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($request->input('acta_de_grado'))))->toMediaCollection('acta_de_grado');
            }
        } elseif ($documentosCandidato->acta_de_grado) {
            $documentosCandidato->acta_de_grado->delete();
        }

        return (new DocumentosCandidatoResource($documentosCandidato))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosCandidato->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
