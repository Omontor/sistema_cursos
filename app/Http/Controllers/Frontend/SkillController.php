<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySkillRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skills = Skill::with(['media'])->get();

        return view('frontend.skills.index', compact('skills'));
    }

    public function create()
    {
        abort_if(Gate::denies('skill_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.skills.create');
    }

    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->all());

        if ($request->input('certificate', false)) {
            $skill->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $skill->id]);
        }

        return redirect()->route('frontend.skills.index');
    }

    public function edit(Skill $skill)
    {
        abort_if(Gate::denies('skill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.skills.edit', compact('skill'));
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update($request->all());

        if ($request->input('certificate', false)) {
            if (!$skill->certificate || $request->input('certificate') !== $skill->certificate->file_name) {
                if ($skill->certificate) {
                    $skill->certificate->delete();
                }
                $skill->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
            }
        } elseif ($skill->certificate) {
            $skill->certificate->delete();
        }

        return redirect()->route('frontend.skills.index');
    }

    public function show(Skill $skill)
    {
        abort_if(Gate::denies('skill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.skills.show', compact('skill'));
    }

    public function destroy(Skill $skill)
    {
        abort_if(Gate::denies('skill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->delete();

        return back();
    }

    public function massDestroy(MassDestroySkillRequest $request)
    {
        Skill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('skill_create') && Gate::denies('skill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Skill();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
