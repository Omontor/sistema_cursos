<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOnlineClassRequest;
use App\Http\Requests\StoreOnlineClassRequest;
use App\Http\Requests\UpdateOnlineClassRequest;
use App\Models\Course;
use App\Models\OnlineClass;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OnlineClassController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('online_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlineClasses = OnlineClass::with(['course', 'created_by'])->get();

        $courses = Course::get();

        $users = User::get();

        return view('frontend.onlineClasses.index', compact('onlineClasses', 'courses', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('online_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.onlineClasses.create', compact('courses'));
    }

    public function store(StoreOnlineClassRequest $request)
    {
        $onlineClass = OnlineClass::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $onlineClass->id]);
        }

        return redirect()->route('frontend.online-classes.index');
    }

    public function edit(OnlineClass $onlineClass)
    {
        abort_if(Gate::denies('online_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $onlineClass->load('course', 'created_by');

        return view('frontend.onlineClasses.edit', compact('courses', 'onlineClass'));
    }

    public function update(UpdateOnlineClassRequest $request, OnlineClass $onlineClass)
    {
        $onlineClass->update($request->all());

        return redirect()->route('frontend.online-classes.index');
    }

    public function show(OnlineClass $onlineClass)
    {
        abort_if(Gate::denies('online_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlineClass->load('course', 'created_by');

        return view('frontend.onlineClasses.show', compact('onlineClass'));
    }

    public function destroy(OnlineClass $onlineClass)
    {
        abort_if(Gate::denies('online_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlineClass->delete();

        return back();
    }

    public function massDestroy(MassDestroyOnlineClassRequest $request)
    {
        OnlineClass::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('online_class_create') && Gate::denies('online_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OnlineClass();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
