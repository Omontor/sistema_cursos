<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Requirment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::with(['teacher', 'students', 'requirements', 'created_by', 'media'])->get();

        $users = User::get();

        $requirments = Requirment::get();

        return view('admin.courses.index', compact('courses', 'users', 'requirments'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = User::all()->pluck('name', 'id');

        $requirements = Requirment::all()->pluck('name', 'id');

        $categories = CourseCategory::all();

        return view('admin.courses.create', compact('teachers', 'students', 'requirements', 'categories'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());
        $course->students()->sync($request->input('students', []));
        $course->requirements()->sync($request->input('requirements', []));
        foreach ($request->input('thumbnail', []) as $file) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('thumbnail');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = User::all()->pluck('name', 'id');

        $requirements = Requirment::all()->pluck('name', 'id');

        $course->load('teacher', 'students', 'requirements', 'created_by');

        $categories = CourseCategory::all();

        return view('admin.courses.edit', compact('teachers', 'students', 'requirements', 'course', 'categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {

        $course->update($request->all());
         $course->category_id = $request->category_id;
         $course->update();
        $course->students()->sync($request->input('students', []));
        $course->requirements()->sync($request->input('requirements', []));
        if (count($course->thumbnail) > 0) {
            foreach ($course->thumbnail as $media) {
                if (!in_array($media->file_name, $request->input('thumbnail', []))) {
                    $media->delete();
                }
            }
        }
        $media = $course->thumbnail->pluck('file_name')->toArray();
        foreach ($request->input('thumbnail', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('thumbnail');
            }
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('teacher', 'students', 'requirements', 'created_by', 'courseReviews', 'courseWishlists', 'courseCertificates', 'courseOnlineClasses', 'courseReservations', 'courseEnrollments', 'coursePurchasedTransactions', 'courseFeaturedCourses');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Course();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
