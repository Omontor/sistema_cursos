<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComplaintTypeRequest;
use App\Http\Requests\StoreComplaintTypeRequest;
use App\Http\Requests\UpdateComplaintTypeRequest;
use App\Models\ComplaintType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComplaintTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('complaint_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaintTypes = ComplaintType::all();

        return view('frontend.complaintTypes.index', compact('complaintTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('complaint_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.complaintTypes.create');
    }

    public function store(StoreComplaintTypeRequest $request)
    {
        $complaintType = ComplaintType::create($request->all());

        return redirect()->route('frontend.complaint-types.index');
    }

    public function edit(ComplaintType $complaintType)
    {
        abort_if(Gate::denies('complaint_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.complaintTypes.edit', compact('complaintType'));
    }

    public function update(UpdateComplaintTypeRequest $request, ComplaintType $complaintType)
    {
        $complaintType->update($request->all());

        return redirect()->route('frontend.complaint-types.index');
    }

    public function show(ComplaintType $complaintType)
    {
        abort_if(Gate::denies('complaint_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.complaintTypes.show', compact('complaintType'));
    }

    public function destroy(ComplaintType $complaintType)
    {
        abort_if(Gate::denies('complaint_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaintType->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplaintTypeRequest $request)
    {
        ComplaintType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
