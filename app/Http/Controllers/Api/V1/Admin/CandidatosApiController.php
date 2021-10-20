<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidatoRequest;
use App\Http\Requests\UpdateCandidatoRequest;
use App\Http\Resources\Admin\CandidatoResource;
use App\Models\Candidato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('candidato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CandidatoResource(Candidato::with(['created_by'])->get());
    }

    public function store(StoreCandidatoRequest $request)
    {
        $candidato = Candidato::create($request->all());

        return (new CandidatoResource($candidato))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Candidato $candidato)
    {
        abort_if(Gate::denies('candidato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CandidatoResource($candidato->load(['created_by']));
    }

    public function update(UpdateCandidatoRequest $request, Candidato $candidato)
    {
        $candidato->update($request->all());

        return (new CandidatoResource($candidato))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Candidato $candidato)
    {
        abort_if(Gate::denies('candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidato->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
