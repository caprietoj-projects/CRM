<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConvenioManRequest;
use App\Http\Requests\StoreConvenioManRequest;
use App\Http\Requests\UpdateConvenioManRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvenioMenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('convenio_man_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.convenioMen.index');
    }

    public function create()
    {
        abort_if(Gate::denies('convenio_man_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.convenioMen.create');
    }

    public function store(StoreConvenioManRequest $request)
    {
        $convenioMan = ConvenioMan::create($request->all());

        return redirect()->route('admin.convenio-men.index');
    }

    public function edit(ConvenioMan $convenioMan)
    {
        abort_if(Gate::denies('convenio_man_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.convenioMen.edit', compact('convenioMan'));
    }

    public function update(UpdateConvenioManRequest $request, ConvenioMan $convenioMan)
    {
        $convenioMan->update($request->all());

        return redirect()->route('admin.convenio-men.index');
    }

    public function show(ConvenioMan $convenioMan)
    {
        abort_if(Gate::denies('convenio_man_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.convenioMen.show', compact('convenioMan'));
    }

    public function destroy(ConvenioMan $convenioMan)
    {
        abort_if(Gate::denies('convenio_man_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $convenioMan->delete();

        return back();
    }

    public function massDestroy(MassDestroyConvenioManRequest $request)
    {
        ConvenioMan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
