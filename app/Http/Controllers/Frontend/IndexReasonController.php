<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIndexReasonRequest;
use App\Http\Requests\StoreIndexReasonRequest;
use App\Http\Requests\UpdateIndexReasonRequest;
use App\Models\IndexReason;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexReasonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('index_reason_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexReasons = IndexReason::all();

        return view('frontend.indexReasons.index', compact('indexReasons'));
    }

    public function create()
    {
        abort_if(Gate::denies('index_reason_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.indexReasons.create');
    }

    public function store(StoreIndexReasonRequest $request)
    {
        $indexReason = IndexReason::create($request->all());

        return redirect()->route('frontend.index-reasons.index');
    }

    public function edit(IndexReason $indexReason)
    {
        abort_if(Gate::denies('index_reason_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.indexReasons.edit', compact('indexReason'));
    }

    public function update(UpdateIndexReasonRequest $request, IndexReason $indexReason)
    {
        $indexReason->update($request->all());

        return redirect()->route('frontend.index-reasons.index');
    }

    public function show(IndexReason $indexReason)
    {
        abort_if(Gate::denies('index_reason_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.indexReasons.show', compact('indexReason'));
    }

    public function destroy(IndexReason $indexReason)
    {
        abort_if(Gate::denies('index_reason_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexReason->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndexReasonRequest $request)
    {
        IndexReason::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
