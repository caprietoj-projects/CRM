<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPruebasPsicotecnicaRequest;
use App\Http\Requests\StorePruebasPsicotecnicaRequest;
use App\Http\Requests\UpdatePruebasPsicotecnicaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PruebasPsicotecnicasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pruebas_psicotecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pruebasPsicotecnicas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pruebas_psicotecnica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pruebasPsicotecnicas.create');
    }

    public function store(StorePruebasPsicotecnicaRequest $request)
    {
        $pruebasPsicotecnica = PruebasPsicotecnica::create($request->all());

        return redirect()->route('admin.pruebas-psicotecnicas.index');
    }

    public function edit(PruebasPsicotecnica $pruebasPsicotecnica)
    {
        abort_if(Gate::denies('pruebas_psicotecnica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pruebasPsicotecnicas.edit', compact('pruebasPsicotecnica'));
    }

    public function update(UpdatePruebasPsicotecnicaRequest $request, PruebasPsicotecnica $pruebasPsicotecnica)
    {
        $pruebasPsicotecnica->update($request->all());

        return redirect()->route('admin.pruebas-psicotecnicas.index');
    }

    public function show(PruebasPsicotecnica $pruebasPsicotecnica)
    {
        abort_if(Gate::denies('pruebas_psicotecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pruebasPsicotecnicas.show', compact('pruebasPsicotecnica'));
    }

    public function destroy(PruebasPsicotecnica $pruebasPsicotecnica)
    {
        abort_if(Gate::denies('pruebas_psicotecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pruebasPsicotecnica->delete();

        return back();
    }

    public function massDestroy(MassDestroyPruebasPsicotecnicaRequest $request)
    {
        PruebasPsicotecnica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
