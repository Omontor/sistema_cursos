<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCtumRequest;
use App\Http\Requests\StoreCtumRequest;
use App\Http\Requests\UpdateCtumRequest;
use App\Models\Ctum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CtaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ctum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cta = Ctum::all();

        return view('admin.cta.index', compact('cta'));
    }

    public function create()
    {
        abort_if(Gate::denies('ctum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cta.create');
    }

    public function store(StoreCtumRequest $request)
    {
        $ctum = Ctum::create($request->all());

        return redirect()->route('admin.cta.index');
    }

    public function edit(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cta.edit', compact('ctum'));
    }

    public function update(UpdateCtumRequest $request, Ctum $ctum)
    {
        $ctum->update($request->all());

        return redirect()->route('admin.cta.index');
    }

    public function show(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cta.show', compact('ctum'));
    }

    public function destroy(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctum->delete();

        return back();
    }

    public function massDestroy(MassDestroyCtumRequest $request)
    {
        Ctum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
