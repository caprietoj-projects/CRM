<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCertificadoLaboralRequest;
use App\Http\Requests\StoreCertificadoLaboralRequest;
use App\Http\Requests\UpdateCertificadoLaboralRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificadoLaboralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('certificado_laboral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.certificadoLaborals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('certificado_laboral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.certificadoLaborals.create');
    }

    public function store(StoreCertificadoLaboralRequest $request)
    {
        $certificadoLaboral = CertificadoLaboral::create($request->all());

        return redirect()->route('admin.certificado-laborals.index');
    }

    public function edit(CertificadoLaboral $certificadoLaboral)
    {
        abort_if(Gate::denies('certificado_laboral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.certificadoLaborals.edit', compact('certificadoLaboral'));
    }

    public function update(UpdateCertificadoLaboralRequest $request, CertificadoLaboral $certificadoLaboral)
    {
        $certificadoLaboral->update($request->all());

        return redirect()->route('admin.certificado-laborals.index');
    }

    public function show(CertificadoLaboral $certificadoLaboral)
    {
        abort_if(Gate::denies('certificado_laboral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.certificadoLaborals.show', compact('certificadoLaboral'));
    }

    public function destroy(CertificadoLaboral $certificadoLaboral)
    {
        abort_if(Gate::denies('certificado_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificadoLaboral->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificadoLaboralRequest $request)
    {
        CertificadoLaboral::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
