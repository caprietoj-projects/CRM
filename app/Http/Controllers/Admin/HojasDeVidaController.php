<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHojasDeVidaRequest;
use App\Http\Requests\StoreHojasDeVidaRequest;
use App\Http\Requests\UpdateHojasDeVidaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HojasDeVidaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hojas_de_vida_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hojasDeVidas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hojas_de_vida_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hojasDeVidas.create');
    }

    public function store(StoreHojasDeVidaRequest $request)
    {
        $hojasDeVida = HojasDeVida::create($request->all());

        return redirect()->route('admin.hojas-de-vidas.index');
    }

    public function edit(HojasDeVida $hojasDeVida)
    {
        abort_if(Gate::denies('hojas_de_vida_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hojasDeVidas.edit', compact('hojasDeVida'));
    }

    public function update(UpdateHojasDeVidaRequest $request, HojasDeVida $hojasDeVida)
    {
        $hojasDeVida->update($request->all());

        return redirect()->route('admin.hojas-de-vidas.index');
    }

    public function show(HojasDeVida $hojasDeVida)
    {
        abort_if(Gate::denies('hojas_de_vida_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hojasDeVidas.show', compact('hojasDeVida'));
    }

    public function destroy(HojasDeVida $hojasDeVida)
    {
        abort_if(Gate::denies('hojas_de_vida_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hojasDeVida->delete();

        return back();
    }

    public function massDestroy(MassDestroyHojasDeVidaRequest $request)
    {
        HojasDeVida::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
