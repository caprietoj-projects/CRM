<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrioridadRequest;
use App\Http\Requests\UpdatePrioridadRequest;
use App\Http\Resources\Admin\PrioridadResource;
use App\Models\Prioridad;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrioridadApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prioridad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrioridadResource(Prioridad::all());
    }

    public function store(StorePrioridadRequest $request)
    {
        $prioridad = Prioridad::create($request->all());

        return (new PrioridadResource($prioridad))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Prioridad $prioridad)
    {
        abort_if(Gate::denies('prioridad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrioridadResource($prioridad);
    }

    public function update(UpdatePrioridadRequest $request, Prioridad $prioridad)
    {
        $prioridad->update($request->all());

        return (new PrioridadResource($prioridad))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Prioridad $prioridad)
    {
        abort_if(Gate::denies('prioridad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prioridad->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
