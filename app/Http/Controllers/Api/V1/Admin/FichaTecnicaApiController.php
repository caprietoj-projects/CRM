<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFichaTecnicaRequest;
use App\Http\Requests\UpdateFichaTecnicaRequest;
use App\Http\Resources\Admin\FichaTecnicaResource;
use App\Models\FichaTecnica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FichaTecnicaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ficha_tecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FichaTecnicaResource(FichaTecnica::with(['grupo', 'ubicacion', 'encargado', 'created_by'])->get());
    }

    public function store(StoreFichaTecnicaRequest $request)
    {
        $fichaTecnica = FichaTecnica::create($request->all());

        if ($request->input('foto', false)) {
            $fichaTecnica->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
        }

        return (new FichaTecnicaResource($fichaTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FichaTecnica $fichaTecnica)
    {
        abort_if(Gate::denies('ficha_tecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FichaTecnicaResource($fichaTecnica->load(['grupo', 'ubicacion', 'encargado', 'created_by']));
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

        return (new FichaTecnicaResource($fichaTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FichaTecnica $fichaTecnica)
    {
        abort_if(Gate::denies('ficha_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichaTecnica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
