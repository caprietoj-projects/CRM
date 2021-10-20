<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedeRequest;
use App\Http\Requests\UpdateSedeRequest;
use App\Http\Resources\Admin\SedeResource;
use App\Models\Sede;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sede_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedeResource(Sede::all());
    }

    public function store(StoreSedeRequest $request)
    {
        $sede = Sede::create($request->all());

        return (new SedeResource($sede))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sede $sede)
    {
        abort_if(Gate::denies('sede_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedeResource($sede);
    }

    public function update(UpdateSedeRequest $request, Sede $sede)
    {
        $sede->update($request->all());

        return (new SedeResource($sede))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sede $sede)
    {
        abort_if(Gate::denies('sede_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sede->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
