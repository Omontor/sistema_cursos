<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequirmentRequest;
use App\Http\Requests\StoreRequirmentRequest;
use App\Http\Requests\UpdateRequirmentRequest;
use App\Models\Requirment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequirmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('requirment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requirments = Requirment::all();

        return view('admin.requirments.index', compact('requirments'));
    }

    public function create()
    {
        abort_if(Gate::denies('requirment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requirments.create');
    }

    public function store(StoreRequirmentRequest $request)
    {
        $requirment = Requirment::create($request->all());

        return redirect()->route('admin.requirments.index');
    }

    public function edit(Requirment $requirment)
    {
        abort_if(Gate::denies('requirment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requirments.edit', compact('requirment'));
    }

    public function update(UpdateRequirmentRequest $request, Requirment $requirment)
    {
        $requirment->update($request->all());

        return redirect()->route('admin.requirments.index');
    }

    public function show(Requirment $requirment)
    {
        abort_if(Gate::denies('requirment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requirment->load('requirementsCourses');

        return view('admin.requirments.show', compact('requirment'));
    }

    public function destroy(Requirment $requirment)
    {
        abort_if(Gate::denies('requirment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requirment->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequirmentRequest $request)
    {
        Requirment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
