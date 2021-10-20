<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCerficadodefuncioneRequest;
use App\Http\Requests\StoreCerficadodefuncioneRequest;
use App\Http\Requests\UpdateCerficadodefuncioneRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CerficadodefuncionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cerficadodefuncione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cerficadodefunciones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cerficadodefuncione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cerficadodefunciones.create');
    }

    public function store(StoreCerficadodefuncioneRequest $request)
    {
        $cerficadodefuncione = Cerficadodefuncione::create($request->all());

        return redirect()->route('admin.cerficadodefunciones.index');
    }

    public function edit(Cerficadodefuncione $cerficadodefuncione)
    {
        abort_if(Gate::denies('cerficadodefuncione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cerficadodefunciones.edit', compact('cerficadodefuncione'));
    }

    public function update(UpdateCerficadodefuncioneRequest $request, Cerficadodefuncione $cerficadodefuncione)
    {
        $cerficadodefuncione->update($request->all());

        return redirect()->route('admin.cerficadodefunciones.index');
    }

    public function show(Cerficadodefuncione $cerficadodefuncione)
    {
        abort_if(Gate::denies('cerficadodefuncione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cerficadodefunciones.show', compact('cerficadodefuncione'));
    }

    public function destroy(Cerficadodefuncione $cerficadodefuncione)
    {
        abort_if(Gate::denies('cerficadodefuncione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cerficadodefuncione->delete();

        return back();
    }

    public function massDestroy(MassDestroyCerficadodefuncioneRequest $request)
    {
        Cerficadodefuncione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
