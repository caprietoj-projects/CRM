<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBienestarRequest;
use App\Http\Requests\StoreBienestarRequest;
use App\Http\Requests\UpdateBienestarRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BienestarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bienestar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bienestars.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bienestar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bienestars.create');
    }

    public function store(StoreBienestarRequest $request)
    {
        $bienestar = Bienestar::create($request->all());

        return redirect()->route('admin.bienestars.index');
    }

    public function edit(Bienestar $bienestar)
    {
        abort_if(Gate::denies('bienestar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bienestars.edit', compact('bienestar'));
    }

    public function update(UpdateBienestarRequest $request, Bienestar $bienestar)
    {
        $bienestar->update($request->all());

        return redirect()->route('admin.bienestars.index');
    }

    public function show(Bienestar $bienestar)
    {
        abort_if(Gate::denies('bienestar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bienestars.show', compact('bienestar'));
    }

    public function destroy(Bienestar $bienestar)
    {
        abort_if(Gate::denies('bienestar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bienestar->delete();

        return back();
    }

    public function massDestroy(MassDestroyBienestarRequest $request)
    {
        Bienestar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
