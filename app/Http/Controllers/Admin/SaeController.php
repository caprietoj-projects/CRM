<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySaeRequest;
use App\Http\Requests\StoreSaeRequest;
use App\Http\Requests\UpdateSaeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sae_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sae_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saes.create');
    }

    public function store(StoreSaeRequest $request)
    {
        $sae = Sae::create($request->all());

        return redirect()->route('admin.saes.index');
    }

    public function edit(Sae $sae)
    {
        abort_if(Gate::denies('sae_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saes.edit', compact('sae'));
    }

    public function update(UpdateSaeRequest $request, Sae $sae)
    {
        $sae->update($request->all());

        return redirect()->route('admin.saes.index');
    }

    public function show(Sae $sae)
    {
        abort_if(Gate::denies('sae_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saes.show', compact('sae'));
    }

    public function destroy(Sae $sae)
    {
        abort_if(Gate::denies('sae_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sae->delete();

        return back();
    }

    public function massDestroy(MassDestroySaeRequest $request)
    {
        Sae::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
