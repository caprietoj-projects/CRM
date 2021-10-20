<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinancieraRequest;
use App\Http\Requests\StoreFinancieraRequest;
use App\Http\Requests\UpdateFinancieraRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinancieraController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('financiera_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financieras.index');
    }

    public function create()
    {
        abort_if(Gate::denies('financiera_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financieras.create');
    }

    public function store(StoreFinancieraRequest $request)
    {
        $financiera = Financiera::create($request->all());

        return redirect()->route('admin.financieras.index');
    }

    public function edit(Financiera $financiera)
    {
        abort_if(Gate::denies('financiera_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financieras.edit', compact('financiera'));
    }

    public function update(UpdateFinancieraRequest $request, Financiera $financiera)
    {
        $financiera->update($request->all());

        return redirect()->route('admin.financieras.index');
    }

    public function show(Financiera $financiera)
    {
        abort_if(Gate::denies('financiera_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financieras.show', compact('financiera'));
    }

    public function destroy(Financiera $financiera)
    {
        abort_if(Gate::denies('financiera_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $financiera->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinancieraRequest $request)
    {
        Financiera::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
