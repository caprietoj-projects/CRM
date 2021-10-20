<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgrentiRequest;
use App\Http\Requests\StoreProgrentiRequest;
use App\Http\Requests\UpdateProgrentiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrentisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('progrenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.progrentis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('progrenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.progrentis.create');
    }

    public function store(StoreProgrentiRequest $request)
    {
        $progrenti = Progrenti::create($request->all());

        return redirect()->route('admin.progrentis.index');
    }

    public function edit(Progrenti $progrenti)
    {
        abort_if(Gate::denies('progrenti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.progrentis.edit', compact('progrenti'));
    }

    public function update(UpdateProgrentiRequest $request, Progrenti $progrenti)
    {
        $progrenti->update($request->all());

        return redirect()->route('admin.progrentis.index');
    }

    public function show(Progrenti $progrenti)
    {
        abort_if(Gate::denies('progrenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.progrentis.show', compact('progrenti'));
    }

    public function destroy(Progrenti $progrenti)
    {
        abort_if(Gate::denies('progrenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progrenti->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgrentiRequest $request)
    {
        Progrenti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
