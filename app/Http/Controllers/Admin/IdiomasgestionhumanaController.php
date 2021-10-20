<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIdiomasgestionhumanaRequest;
use App\Http\Requests\StoreIdiomasgestionhumanaRequest;
use App\Http\Requests\UpdateIdiomasgestionhumanaRequest;
use App\Models\Idiomasgestionhumana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IdiomasgestionhumanaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('idiomasgestionhumana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Idiomasgestionhumana::with(['created_by'])->select(sprintf('%s.*', (new Idiomasgestionhumana())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'idiomasgestionhumana_show';
                $editGate = 'idiomasgestionhumana_edit';
                $deleteGate = 'idiomasgestionhumana_delete';
                $crudRoutePart = 'idiomasgestionhumanas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nuevo', function ($row) {
                return $row->nuevo ? $row->nuevo : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.idiomasgestionhumanas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('idiomasgestionhumana_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.idiomasgestionhumanas.create');
    }

    public function store(StoreIdiomasgestionhumanaRequest $request)
    {
        $idiomasgestionhumana = Idiomasgestionhumana::create($request->all());

        return redirect()->route('admin.idiomasgestionhumanas.index');
    }

    public function edit(Idiomasgestionhumana $idiomasgestionhumana)
    {
        abort_if(Gate::denies('idiomasgestionhumana_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomasgestionhumana->load('created_by');

        return view('admin.idiomasgestionhumanas.edit', compact('idiomasgestionhumana'));
    }

    public function update(UpdateIdiomasgestionhumanaRequest $request, Idiomasgestionhumana $idiomasgestionhumana)
    {
        $idiomasgestionhumana->update($request->all());

        return redirect()->route('admin.idiomasgestionhumanas.index');
    }

    public function show(Idiomasgestionhumana $idiomasgestionhumana)
    {
        abort_if(Gate::denies('idiomasgestionhumana_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomasgestionhumana->load('created_by');

        return view('admin.idiomasgestionhumanas.show', compact('idiomasgestionhumana'));
    }

    public function destroy(Idiomasgestionhumana $idiomasgestionhumana)
    {
        abort_if(Gate::denies('idiomasgestionhumana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomasgestionhumana->delete();

        return back();
    }

    public function massDestroy(MassDestroyIdiomasgestionhumanaRequest $request)
    {
        Idiomasgestionhumana::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
