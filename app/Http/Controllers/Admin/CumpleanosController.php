<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCumpleanoRequest;
use App\Http\Requests\StoreCumpleanoRequest;
use App\Http\Requests\UpdateCumpleanoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CumpleanosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cumpleano_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cumpleanos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cumpleano_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cumpleanos.create');
    }

    public function store(StoreCumpleanoRequest $request)
    {
        $cumpleano = Cumpleano::create($request->all());

        return redirect()->route('admin.cumpleanos.index');
    }

    public function edit(Cumpleano $cumpleano)
    {
        abort_if(Gate::denies('cumpleano_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cumpleanos.edit', compact('cumpleano'));
    }

    public function update(UpdateCumpleanoRequest $request, Cumpleano $cumpleano)
    {
        $cumpleano->update($request->all());

        return redirect()->route('admin.cumpleanos.index');
    }

    public function show(Cumpleano $cumpleano)
    {
        abort_if(Gate::denies('cumpleano_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cumpleanos.show', compact('cumpleano'));
    }

    public function destroy(Cumpleano $cumpleano)
    {
        abort_if(Gate::denies('cumpleano_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cumpleano->delete();

        return back();
    }

    public function massDestroy(MassDestroyCumpleanoRequest $request)
    {
        Cumpleano::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
