<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReparacionRequest;
use App\Http\Requests\UpdateReparacionRequest;
use App\Http\Resources\Admin\ReparacionResource;
use App\Models\Reparacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReparacionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reparacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReparacionResource(Reparacion::with(['activo', 'created_by'])->get());
    }

    public function store(StoreReparacionRequest $request)
    {
        $reparacion = Reparacion::create($request->all());

        return (new ReparacionResource($reparacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reparacion $reparacion)
    {
        abort_if(Gate::denies('reparacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReparacionResource($reparacion->load(['activo', 'created_by']));
    }

    public function update(UpdateReparacionRequest $request, Reparacion $reparacion)
    {
        $reparacion->update($request->all());

        return (new ReparacionResource($reparacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reparacion $reparacion)
    {
        abort_if(Gate::denies('reparacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reparacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
