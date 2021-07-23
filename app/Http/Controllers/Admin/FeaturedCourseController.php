<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeaturedCourseRequest;
use App\Http\Requests\StoreFeaturedCourseRequest;
use App\Http\Requests\UpdateFeaturedCourseRequest;
use App\Models\Course;
use App\Models\FeaturedCourse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturedCourseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('featured_course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredCourses = FeaturedCourse::with(['courses'])->get();

        return view('admin.featuredCourses.index', compact('featuredCourses'));
    }

    public function create()
    {
        abort_if(Gate::denies('featured_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('title', 'id');

        return view('admin.featuredCourses.create', compact('courses'));
    }

    public function store(StoreFeaturedCourseRequest $request)
    {
        $featuredCourse = FeaturedCourse::create($request->all());
        $featuredCourse->courses()->sync($request->input('courses', []));

        return redirect()->route('admin.featured-courses.index');
    }

    public function edit(FeaturedCourse $featuredCourse)
    {
        abort_if(Gate::denies('featured_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('title', 'id');

        $featuredCourse->load('courses');

        return view('admin.featuredCourses.edit', compact('courses', 'featuredCourse'));
    }

    public function update(UpdateFeaturedCourseRequest $request, FeaturedCourse $featuredCourse)
    {
        $featuredCourse->update($request->all());
        $featuredCourse->courses()->sync($request->input('courses', []));

        return redirect()->route('admin.featured-courses.index');
    }

    public function show(FeaturedCourse $featuredCourse)
    {
        abort_if(Gate::denies('featured_course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredCourse->load('courses');

        return view('admin.featuredCourses.show', compact('featuredCourse'));
    }

    public function destroy(FeaturedCourse $featuredCourse)
    {
        abort_if(Gate::denies('featured_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredCourse->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeaturedCourseRequest $request)
    {
        FeaturedCourse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
