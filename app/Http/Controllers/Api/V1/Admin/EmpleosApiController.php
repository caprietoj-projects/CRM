<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEmpleoRequest;
use App\Http\Requests\UpdateEmpleoRequest;
use App\Http\Resources\Admin\EmpleoResource;
use App\Models\Empleo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('empleo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmpleoResource(Empleo::with(['created_by'])->get());
    }

    public function store(StoreEmpleoRequest $request)
    {
        $empleo = Empleo::create($request->all());

        return (new EmpleoResource($empleo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Empleo $empleo)
    {
        abort_if(Gate::denies('empleo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmpleoResource($empleo->load(['created_by']));
    }

    public function update(UpdateEmpleoRequest $request, Empleo $empleo)
    {
        $empleo->update($request->all());

        return (new EmpleoResource($empleo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Empleo $empleo)
    {
        abort_if(Gate::denies('empleo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
