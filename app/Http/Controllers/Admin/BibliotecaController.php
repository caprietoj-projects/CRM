<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBibliotecaRequest;
use App\Http\Requests\StoreBibliotecaRequest;
use App\Http\Requests\UpdateBibliotecaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BibliotecaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('biblioteca_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bibliotecas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('biblioteca_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bibliotecas.create');
    }

    public function store(StoreBibliotecaRequest $request)
    {
        $biblioteca = Biblioteca::create($request->all());

        return redirect()->route('admin.bibliotecas.index');
    }

    public function edit(Biblioteca $biblioteca)
    {
        abort_if(Gate::denies('biblioteca_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bibliotecas.edit', compact('biblioteca'));
    }

    public function update(UpdateBibliotecaRequest $request, Biblioteca $biblioteca)
    {
        $biblioteca->update($request->all());

        return redirect()->route('admin.bibliotecas.index');
    }

    public function show(Biblioteca $biblioteca)
    {
        abort_if(Gate::denies('biblioteca_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bibliotecas.show', compact('biblioteca'));
    }

    public function destroy(Biblioteca $biblioteca)
    {
        abort_if(Gate::denies('biblioteca_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biblioteca->delete();

        return back();
    }

    public function massDestroy(MassDestroyBibliotecaRequest $request)
    {
        Biblioteca::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
