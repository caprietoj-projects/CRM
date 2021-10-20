<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAtencionAlUsuarioRequest;
use App\Http\Requests\StoreAtencionAlUsuarioRequest;
use App\Http\Requests\UpdateAtencionAlUsuarioRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AtencionAlUsuarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('atencion_al_usuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atencionAlUsuarios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('atencion_al_usuario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atencionAlUsuarios.create');
    }

    public function store(StoreAtencionAlUsuarioRequest $request)
    {
        $atencionAlUsuario = AtencionAlUsuario::create($request->all());

        return redirect()->route('admin.atencion-al-usuarios.index');
    }

    public function edit(AtencionAlUsuario $atencionAlUsuario)
    {
        abort_if(Gate::denies('atencion_al_usuario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atencionAlUsuarios.edit', compact('atencionAlUsuario'));
    }

    public function update(UpdateAtencionAlUsuarioRequest $request, AtencionAlUsuario $atencionAlUsuario)
    {
        $atencionAlUsuario->update($request->all());

        return redirect()->route('admin.atencion-al-usuarios.index');
    }

    public function show(AtencionAlUsuario $atencionAlUsuario)
    {
        abort_if(Gate::denies('atencion_al_usuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atencionAlUsuarios.show', compact('atencionAlUsuario'));
    }

    public function destroy(AtencionAlUsuario $atencionAlUsuario)
    {
        abort_if(Gate::denies('atencion_al_usuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atencionAlUsuario->delete();

        return back();
    }

    public function massDestroy(MassDestroyAtencionAlUsuarioRequest $request)
    {
        AtencionAlUsuario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
