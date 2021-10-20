<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPastoralRequest;
use App\Http\Requests\StorePastoralRequest;
use App\Http\Requests\UpdatePastoralRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PastoralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pastoral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pastorals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pastoral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pastorals.create');
    }

    public function store(StorePastoralRequest $request)
    {
        $pastoral = Pastoral::create($request->all());

        return redirect()->route('admin.pastorals.index');
    }

    public function edit(Pastoral $pastoral)
    {
        abort_if(Gate::denies('pastoral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pastorals.edit', compact('pastoral'));
    }

    public function update(UpdatePastoralRequest $request, Pastoral $pastoral)
    {
        $pastoral->update($request->all());

        return redirect()->route('admin.pastorals.index');
    }

    public function show(Pastoral $pastoral)
    {
        abort_if(Gate::denies('pastoral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pastorals.show', compact('pastoral'));
    }

    public function destroy(Pastoral $pastoral)
    {
        abort_if(Gate::denies('pastoral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pastoral->delete();

        return back();
    }

    public function massDestroy(MassDestroyPastoralRequest $request)
    {
        Pastoral::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
