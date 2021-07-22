<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseCategoryRequest;
use App\Http\Requests\StoreCourseCategoryRequest;
use App\Http\Requests\UpdateCourseCategoryRequest;
use App\Models\CourseCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CourseCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategories = CourseCategory::with(['media'])->get();

        return view('admin.courseCategories.index', compact('courseCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseCategories.create');
    }

    public function store(StoreCourseCategoryRequest $request)
    {
        $courseCategory = CourseCategory::create($request->all());

        if ($request->input('icon', false)) {
            $courseCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $courseCategory->id]);
        }

        return redirect()->route('admin.course-categories.index');
    }

    public function edit(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseCategories.edit', compact('courseCategory'));
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

        return redirect()->route('admin.course-categories.index');
    }

    public function show(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategory->load('categoryBlogs');

        return view('admin.courseCategories.show', compact('courseCategory'));
    }

    public function destroy(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseCategoryRequest $request)
    {
        CourseCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_category_create') && Gate::denies('course_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CourseCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
