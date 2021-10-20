<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlanDeFormacionRequest;
use App\Http\Requests\StorePlanDeFormacionRequest;
use App\Http\Requests\UpdatePlanDeFormacionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanDeFormacionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plan_de_formacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeFormacions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('plan_de_formacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeFormacions.create');
    }

    public function store(StorePlanDeFormacionRequest $request)
    {
        $planDeFormacion = PlanDeFormacion::create($request->all());

        return redirect()->route('admin.plan-de-formacions.index');
    }

    public function edit(PlanDeFormacion $planDeFormacion)
    {
        abort_if(Gate::denies('plan_de_formacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeFormacions.edit', compact('planDeFormacion'));
    }

    public function update(UpdatePlanDeFormacionRequest $request, PlanDeFormacion $planDeFormacion)
    {
        $planDeFormacion->update($request->all());

        return redirect()->route('admin.plan-de-formacions.index');
    }

    public function show(PlanDeFormacion $planDeFormacion)
    {
        abort_if(Gate::denies('plan_de_formacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeFormacions.show', compact('planDeFormacion'));
    }

    public function destroy(PlanDeFormacion $planDeFormacion)
    {
        abort_if(Gate::denies('plan_de_formacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planDeFormacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanDeFormacionRequest $request)
    {
        PlanDeFormacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
