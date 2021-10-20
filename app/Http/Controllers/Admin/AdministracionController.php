<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdministracionRequest;
use App\Http\Requests\StoreAdministracionRequest;
use App\Http\Requests\UpdateAdministracionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministracionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('administracion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administracions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('administracion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administracions.create');
    }

    public function store(StoreAdministracionRequest $request)
    {
        $administracion = Administracion::create($request->all());

        return redirect()->route('admin.administracions.index');
    }

    public function edit(Administracion $administracion)
    {
        abort_if(Gate::denies('administracion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administracions.edit', compact('administracion'));
    }

    public function update(UpdateAdministracionRequest $request, Administracion $administracion)
    {
        $administracion->update($request->all());

        return redirect()->route('admin.administracions.index');
    }

    public function show(Administracion $administracion)
    {
        abort_if(Gate::denies('administracion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administracions.show', compact('administracion'));
    }

    public function destroy(Administracion $administracion)
    {
        abort_if(Gate::denies('administracion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $administracion->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdministracionRequest $request)
    {
        Administracion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
