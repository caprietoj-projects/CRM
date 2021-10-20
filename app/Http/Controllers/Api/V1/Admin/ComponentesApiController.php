<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComponenteRequest;
use App\Http\Requests\UpdateComponenteRequest;
use App\Http\Resources\Admin\ComponenteResource;
use App\Models\Componente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComponentesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('componente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComponenteResource(Componente::with(['created_by'])->get());
    }

    public function store(StoreComponenteRequest $request)
    {
        $componente = Componente::create($request->all());

        return (new ComponenteResource($componente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Componente $componente)
    {
        abort_if(Gate::denies('componente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComponenteResource($componente->load(['created_by']));
    }

    public function update(UpdateComponenteRequest $request, Componente $componente)
    {
        $componente->update($request->all());

        return (new ComponenteResource($componente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Componente $componente)
    {
        abort_if(Gate::denies('componente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $componente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
