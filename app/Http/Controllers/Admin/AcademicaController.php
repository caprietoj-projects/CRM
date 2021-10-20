<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcademicaRequest;
use App\Http\Requests\StoreAcademicaRequest;
use App\Http\Requests\UpdateAcademicaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('academica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicas.create');
    }

    public function store(StoreAcademicaRequest $request)
    {
        $academica = Academica::create($request->all());

        return redirect()->route('admin.academicas.index');
    }

    public function edit(Academica $academica)
    {
        abort_if(Gate::denies('academica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicas.edit', compact('academica'));
    }

    public function update(UpdateAcademicaRequest $request, Academica $academica)
    {
        $academica->update($request->all());

        return redirect()->route('admin.academicas.index');
    }

    public function show(Academica $academica)
    {
        abort_if(Gate::denies('academica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicas.show', compact('academica'));
    }

    public function destroy(Academica $academica)
    {
        abort_if(Gate::denies('academica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academica->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcademicaRequest $request)
    {
        Academica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
