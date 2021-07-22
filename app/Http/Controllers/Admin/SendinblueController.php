<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySendinblueRequest;
use App\Http\Requests\StoreSendinblueRequest;
use App\Http\Requests\UpdateSendinblueRequest;
use App\Models\Sendinblue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendinblueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sendinblue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendinblues = Sendinblue::all();

        return view('admin.sendinblues.index', compact('sendinblues'));
    }

    public function create()
    {
        abort_if(Gate::denies('sendinblue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendinblues.create');
    }

    public function store(StoreSendinblueRequest $request)
    {
        $sendinblue = Sendinblue::create($request->all());

        return redirect()->route('admin.sendinblues.index');
    }

    public function edit(Sendinblue $sendinblue)
    {
        abort_if(Gate::denies('sendinblue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendinblues.edit', compact('sendinblue'));
    }

    public function update(UpdateSendinblueRequest $request, Sendinblue $sendinblue)
    {
        $sendinblue->update($request->all());

        return redirect()->route('admin.sendinblues.index');
    }

    public function show(Sendinblue $sendinblue)
    {
        abort_if(Gate::denies('sendinblue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendinblues.show', compact('sendinblue'));
    }

    public function destroy(Sendinblue $sendinblue)
    {
        abort_if(Gate::denies('sendinblue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendinblue->delete();

        return back();
    }

    public function massDestroy(MassDestroySendinblueRequest $request)
    {
        Sendinblue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
