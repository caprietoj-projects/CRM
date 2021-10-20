<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncidenteRequest;
use App\Http\Requests\UpdateIncidenteRequest;
use App\Http\Resources\Admin\IncidenteResource;
use App\Models\Incidente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncidenteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('incidente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncidenteResource(Incidente::all());
    }

    public function store(StoreIncidenteRequest $request)
    {
        $incidente = Incidente::create($request->all());

        return (new IncidenteResource($incidente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Incidente $incidente)
    {
        abort_if(Gate::denies('incidente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncidenteResource($incidente);
    }

    public function update(UpdateIncidenteRequest $request, Incidente $incidente)
    {
        $incidente->update($request->all());

        return (new IncidenteResource($incidente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Incidente $incidente)
    {
        abort_if(Gate::denies('incidente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
