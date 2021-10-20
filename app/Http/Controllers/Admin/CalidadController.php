<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCalidadRequest;
use App\Http\Requests\StoreCalidadRequest;
use App\Http\Requests\UpdateCalidadRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalidadController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('calidad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calidads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('calidad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calidads.create');
    }

    public function store(StoreCalidadRequest $request)
    {
        $calidad = Calidad::create($request->all());

        return redirect()->route('admin.calidads.index');
    }

    public function edit(Calidad $calidad)
    {
        abort_if(Gate::denies('calidad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calidads.edit', compact('calidad'));
    }

    public function update(UpdateCalidadRequest $request, Calidad $calidad)
    {
        $calidad->update($request->all());

        return redirect()->route('admin.calidads.index');
    }

    public function show(Calidad $calidad)
    {
        abort_if(Gate::denies('calidad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calidads.show', compact('calidad'));
    }

    public function destroy(Calidad $calidad)
    {
        abort_if(Gate::denies('calidad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calidad->delete();

        return back();
    }

    public function massDestroy(MassDestroyCalidadRequest $request)
    {
        Calidad::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
