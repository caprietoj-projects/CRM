<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySgSstRequest;
use App\Http\Requests\StoreSgSstRequest;
use App\Http\Requests\UpdateSgSstRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SgSstController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sg_sst_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sgSsts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sg_sst_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sgSsts.create');
    }

    public function store(StoreSgSstRequest $request)
    {
        $sgSst = SgSst::create($request->all());

        return redirect()->route('admin.sg-ssts.index');
    }

    public function edit(SgSst $sgSst)
    {
        abort_if(Gate::denies('sg_sst_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sgSsts.edit', compact('sgSst'));
    }

    public function update(UpdateSgSstRequest $request, SgSst $sgSst)
    {
        $sgSst->update($request->all());

        return redirect()->route('admin.sg-ssts.index');
    }

    public function show(SgSst $sgSst)
    {
        abort_if(Gate::denies('sg_sst_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sgSsts.show', compact('sgSst'));
    }

    public function destroy(SgSst $sgSst)
    {
        abort_if(Gate::denies('sg_sst_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgSst->delete();

        return back();
    }

    public function massDestroy(MassDestroySgSstRequest $request)
    {
        SgSst::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
