<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyForumComplaintRequest;
use App\Http\Requests\StoreForumComplaintRequest;
use App\Http\Requests\UpdateForumComplaintRequest;
use App\Models\ComplaintType;
use App\Models\ForumComplaint;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ForumComplaintController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('forum_complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumComplaints = ForumComplaint::with(['user', 'type', 'media'])->get();

        return view('admin.forumComplaints.index', compact('forumComplaints'));
    }

    public function create()
    {
        abort_if(Gate::denies('forum_complaint_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = ComplaintType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.forumComplaints.create', compact('users', 'types'));
    }

    public function store(StoreForumComplaintRequest $request)
    {
        $forumComplaint = ForumComplaint::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $forumComplaint->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $forumComplaint->id]);
        }

        return redirect()->route('admin.forum-complaints.index');
    }

    public function edit(ForumComplaint $forumComplaint)
    {
        abort_if(Gate::denies('forum_complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = ComplaintType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $forumComplaint->load('user', 'type');

        return view('admin.forumComplaints.edit', compact('users', 'types', 'forumComplaint'));
    }

    public function update(UpdateForumComplaintRequest $request, ForumComplaint $forumComplaint)
    {
        $forumComplaint->update($request->all());

        if (count($forumComplaint->images) > 0) {
            foreach ($forumComplaint->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $forumComplaint->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $forumComplaint->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.forum-complaints.index');
    }

    public function show(ForumComplaint $forumComplaint)
    {
        abort_if(Gate::denies('forum_complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumComplaint->load('user', 'type');

        return view('admin.forumComplaints.show', compact('forumComplaint'));
    }

    public function destroy(ForumComplaint $forumComplaint)
    {
        abort_if(Gate::denies('forum_complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumComplaint->delete();

        return back();
    }

    public function massDestroy(MassDestroyForumComplaintRequest $request)
    {
        ForumComplaint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('forum_complaint_create') && Gate::denies('forum_complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ForumComplaint();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
