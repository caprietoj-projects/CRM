<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPromocionInstitucionalRequest;
use App\Http\Requests\StorePromocionInstitucionalRequest;
use App\Http\Requests\UpdatePromocionInstitucionalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromocionInstitucionalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promocion_institucional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocionInstitucionals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('promocion_institucional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocionInstitucionals.create');
    }

    public function store(StorePromocionInstitucionalRequest $request)
    {
        $promocionInstitucional = PromocionInstitucional::create($request->all());

        return redirect()->route('admin.promocion-institucionals.index');
    }

    public function edit(PromocionInstitucional $promocionInstitucional)
    {
        abort_if(Gate::denies('promocion_institucional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocionInstitucionals.edit', compact('promocionInstitucional'));
    }

    public function update(UpdatePromocionInstitucionalRequest $request, PromocionInstitucional $promocionInstitucional)
    {
        $promocionInstitucional->update($request->all());

        return redirect()->route('admin.promocion-institucionals.index');
    }

    public function show(PromocionInstitucional $promocionInstitucional)
    {
        abort_if(Gate::denies('promocion_institucional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocionInstitucionals.show', compact('promocionInstitucional'));
    }

    public function destroy(PromocionInstitucional $promocionInstitucional)
    {
        abort_if(Gate::denies('promocion_institucional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promocionInstitucional->delete();

        return back();
    }

    public function massDestroy(MassDestroyPromocionInstitucionalRequest $request)
    {
        PromocionInstitucional::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
