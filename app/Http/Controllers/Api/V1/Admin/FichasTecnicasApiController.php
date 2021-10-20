<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFichasTecnicaRequest;
use App\Http\Requests\UpdateFichasTecnicaRequest;
use App\Http\Resources\Admin\FichasTecnicaResource;
use App\Models\FichasTecnica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FichasTecnicasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fichas_tecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FichasTecnicaResource(FichasTecnica::with(['sede', 'created_by'])->get());
    }

    public function store(StoreFichasTecnicaRequest $request)
    {
        $fichasTecnica = FichasTecnica::create($request->all());

        return (new FichasTecnicaResource($fichasTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FichasTecnica $fichasTecnica)
    {
        abort_if(Gate::denies('fichas_tecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FichasTecnicaResource($fichasTecnica->load(['sede', 'created_by']));
    }

    public function update(UpdateFichasTecnicaRequest $request, FichasTecnica $fichasTecnica)
    {
        $fichasTecnica->update($request->all());

        return (new FichasTecnicaResource($fichasTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FichasTecnica $fichasTecnica)
    {
        abort_if(Gate::denies('fichas_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichasTecnica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
