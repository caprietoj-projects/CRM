<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProyectosArticuladoRequest;
use App\Http\Requests\UpdateProyectosArticuladoRequest;
use App\Http\Resources\Admin\ProyectosArticuladoResource;
use App\Models\ProyectosArticulado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProyectosArticuladosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proyectos_articulado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProyectosArticuladoResource(ProyectosArticulado::with(['created_by'])->get());
    }

    public function store(StoreProyectosArticuladoRequest $request)
    {
        $proyectosArticulado = ProyectosArticulado::create($request->all());

        if ($request->input('proyecto', false)) {
            $proyectosArticulado->addMedia(storage_path('tmp/uploads/' . basename($request->input('proyecto'))))->toMediaCollection('proyecto');
        }

        return (new ProyectosArticuladoResource($proyectosArticulado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProyectosArticulado $proyectosArticulado)
    {
        abort_if(Gate::denies('proyectos_articulado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProyectosArticuladoResource($proyectosArticulado->load(['created_by']));
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

        return (new ProyectosArticuladoResource($proyectosArticulado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProyectosArticulado $proyectosArticulado)
    {
        abort_if(Gate::denies('proyectos_articulado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectosArticulado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
