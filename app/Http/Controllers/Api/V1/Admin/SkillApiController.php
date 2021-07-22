<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\Admin\SkillResource;
use App\Models\Skill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkillResource(Skill::all());
    }

    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->all());

        if ($request->input('certificate', false)) {
            $skill->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        return (new SkillResource($skill))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Skill $skill)
    {
        abort_if(Gate::denies('skill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkillResource($skill);
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

        return (new SkillResource($skill))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Skill $skill)
    {
        abort_if(Gate::denies('skill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
