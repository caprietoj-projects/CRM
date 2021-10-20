<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdiomasgestionhumanaRequest;
use App\Http\Requests\UpdateIdiomasgestionhumanaRequest;
use App\Http\Resources\Admin\IdiomasgestionhumanaResource;
use App\Models\Idiomasgestionhumana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdiomasgestionhumanaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('idiomasgestionhumana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdiomasgestionhumanaResource(Idiomasgestionhumana::with(['created_by'])->get());
    }

    public function store(StoreIdiomasgestionhumanaRequest $request)
    {
        $idiomasgestionhumana = Idiomasgestionhumana::create($request->all());

        return (new IdiomasgestionhumanaResource($idiomasgestionhumana))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Idiomasgestionhumana $idiomasgestionhumana)
    {
        abort_if(Gate::denies('idiomasgestionhumana_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdiomasgestionhumanaResource($idiomasgestionhumana->load(['created_by']));
    }

    public function update(UpdateIdiomasgestionhumanaRequest $request, Idiomasgestionhumana $idiomasgestionhumana)
    {
        $idiomasgestionhumana->update($request->all());

        return (new IdiomasgestionhumanaResource($idiomasgestionhumana))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Idiomasgestionhumana $idiomasgestionhumana)
    {
        abort_if(Gate::denies('idiomasgestionhumana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomasgestionhumana->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
