<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEvaluacionDeDesempenoRequest;
use App\Http\Requests\StoreEvaluacionDeDesempenoRequest;
use App\Http\Requests\UpdateEvaluacionDeDesempenoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvaluacionDeDesempenoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('evaluacion_de_desempeno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluacionDeDesempenos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('evaluacion_de_desempeno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluacionDeDesempenos.create');
    }

    public function store(StoreEvaluacionDeDesempenoRequest $request)
    {
        $evaluacionDeDesempeno = EvaluacionDeDesempeno::create($request->all());

        return redirect()->route('admin.evaluacion-de-desempenos.index');
    }

    public function edit(EvaluacionDeDesempeno $evaluacionDeDesempeno)
    {
        abort_if(Gate::denies('evaluacion_de_desempeno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluacionDeDesempenos.edit', compact('evaluacionDeDesempeno'));
    }

    public function update(UpdateEvaluacionDeDesempenoRequest $request, EvaluacionDeDesempeno $evaluacionDeDesempeno)
    {
        $evaluacionDeDesempeno->update($request->all());

        return redirect()->route('admin.evaluacion-de-desempenos.index');
    }

    public function show(EvaluacionDeDesempeno $evaluacionDeDesempeno)
    {
        abort_if(Gate::denies('evaluacion_de_desempeno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluacionDeDesempenos.show', compact('evaluacionDeDesempeno'));
    }

    public function destroy(EvaluacionDeDesempeno $evaluacionDeDesempeno)
    {
        abort_if(Gate::denies('evaluacion_de_desempeno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evaluacionDeDesempeno->delete();

        return back();
    }

    public function massDestroy(MassDestroyEvaluacionDeDesempenoRequest $request)
    {
        EvaluacionDeDesempeno::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
