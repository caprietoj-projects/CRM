<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrendiRequest;
use App\Http\Requests\StoreTrendiRequest;
use App\Http\Requests\UpdateTrendiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrendiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trendi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trendis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('trendi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trendis.create');
    }

    public function store(StoreTrendiRequest $request)
    {
        $trendi = Trendi::create($request->all());

        return redirect()->route('admin.trendis.index');
    }

    public function edit(Trendi $trendi)
    {
        abort_if(Gate::denies('trendi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trendis.edit', compact('trendi'));
    }

    public function update(UpdateTrendiRequest $request, Trendi $trendi)
    {
        $trendi->update($request->all());

        return redirect()->route('admin.trendis.index');
    }

    public function show(Trendi $trendi)
    {
        abort_if(Gate::denies('trendi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trendis.show', compact('trendi'));
    }

    public function destroy(Trendi $trendi)
    {
        abort_if(Gate::denies('trendi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trendi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrendiRequest $request)
    {
        Trendi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
