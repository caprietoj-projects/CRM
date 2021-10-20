<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySchoolpackRequest;
use App\Http\Requests\StoreSchoolpackRequest;
use App\Http\Requests\UpdateSchoolpackRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolpackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('schoolpack_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schoolpacks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('schoolpack_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schoolpacks.create');
    }

    public function store(StoreSchoolpackRequest $request)
    {
        $schoolpack = Schoolpack::create($request->all());

        return redirect()->route('admin.schoolpacks.index');
    }

    public function edit(Schoolpack $schoolpack)
    {
        abort_if(Gate::denies('schoolpack_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schoolpacks.edit', compact('schoolpack'));
    }

    public function update(UpdateSchoolpackRequest $request, Schoolpack $schoolpack)
    {
        $schoolpack->update($request->all());

        return redirect()->route('admin.schoolpacks.index');
    }

    public function show(Schoolpack $schoolpack)
    {
        abort_if(Gate::denies('schoolpack_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schoolpacks.show', compact('schoolpack'));
    }

    public function destroy(Schoolpack $schoolpack)
    {
        abort_if(Gate::denies('schoolpack_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schoolpack->delete();

        return back();
    }

    public function massDestroy(MassDestroySchoolpackRequest $request)
    {
        Schoolpack::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
