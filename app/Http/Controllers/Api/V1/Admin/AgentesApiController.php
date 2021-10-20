<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgenteRequest;
use App\Http\Requests\UpdateAgenteRequest;
use App\Http\Resources\Admin\AgenteResource;
use App\Models\Agente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenteResource(Agente::all());
    }

    public function store(StoreAgenteRequest $request)
    {
        $agente = Agente::create($request->all());

        return (new AgenteResource($agente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agente $agente)
    {
        abort_if(Gate::denies('agente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenteResource($agente);
    }

    public function update(UpdateAgenteRequest $request, Agente $agente)
    {
        $agente->update($request->all());

        return (new AgenteResource($agente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agente $agente)
    {
        abort_if(Gate::denies('agente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
