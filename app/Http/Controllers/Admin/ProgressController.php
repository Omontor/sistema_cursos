<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgressRequest;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Lesson;
use App\Models\Progress;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgressController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('progress_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progress = Progress::with(['user', 'lesson'])->get();

        return view('admin.progress.index', compact('progress'));
    }

    public function create()
    {
        abort_if(Gate::denies('progress_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.progress.create', compact('users', 'lessons'));
    }

    public function store(StoreProgressRequest $request)
    {
        $progress = Progress::create($request->all());

        return redirect()->route('admin.progress.index');
    }

    public function edit(Progress $progress)
    {
        abort_if(Gate::denies('progress_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $progress->load('user', 'lesson');

        return view('admin.progress.edit', compact('users', 'lessons', 'progress'));
    }

    public function update(UpdateProgressRequest $request, Progress $progress)
    {
        $progress->update($request->all());

        return redirect()->route('admin.progress.index');
    }

    public function show(Progress $progress)
    {
        abort_if(Gate::denies('progress_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progress->load('user', 'lesson');

        return view('admin.progress.show', compact('progress'));
    }

    public function destroy(Progress $progress)
    {
        abort_if(Gate::denies('progress_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progress->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgressRequest $request)
    {
        Progress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
