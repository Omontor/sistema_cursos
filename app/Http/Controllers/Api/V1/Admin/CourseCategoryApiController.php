<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCourseCategoryRequest;
use App\Http\Requests\UpdateCourseCategoryRequest;
use App\Http\Resources\Admin\CourseCategoryResource;
use App\Models\CourseCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseCategoryResource(CourseCategory::all());
    }

    public function store(StoreCourseCategoryRequest $request)
    {
        $courseCategory = CourseCategory::create($request->all());

        if ($request->input('icon', false)) {
            $courseCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        return (new CourseCategoryResource($courseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseCategoryResource($courseCategory);
    }

    public function update(UpdateCourseCategoryRequest $request, CourseCategory $courseCategory)
    {
        $courseCategory->update($request->all());

        if ($request->input('icon', false)) {
            if (!$courseCategory->icon || $request->input('icon') !== $courseCategory->icon->file_name) {
                if ($courseCategory->icon) {
                    $courseCategory->icon->delete();
                }
                $courseCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($courseCategory->icon) {
            $courseCategory->icon->delete();
        }

        return (new CourseCategoryResource($courseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
