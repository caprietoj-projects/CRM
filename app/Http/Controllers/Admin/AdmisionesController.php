<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdmisioneRequest;
use App\Http\Requests\StoreAdmisioneRequest;
use App\Http\Requests\UpdateAdmisioneRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmisionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admisione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admisiones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('admisione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admisiones.create');
    }

    public function store(StoreAdmisioneRequest $request)
    {
        $admisione = Admisione::create($request->all());

        return redirect()->route('admin.admisiones.index');
    }

    public function edit(Admisione $admisione)
    {
        abort_if(Gate::denies('admisione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admisiones.edit', compact('admisione'));
    }

    public function update(UpdateAdmisioneRequest $request, Admisione $admisione)
    {
        $admisione->update($request->all());

        return redirect()->route('admin.admisiones.index');
    }

    public function show(Admisione $admisione)
    {
        abort_if(Gate::denies('admisione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admisiones.show', compact('admisione'));
    }

    public function destroy(Admisione $admisione)
    {
        abort_if(Gate::denies('admisione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admisione->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdmisioneRequest $request)
    {
        Admisione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
