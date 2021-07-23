<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeaturedCourseRequest;
use App\Http\Requests\UpdateFeaturedCourseRequest;
use App\Http\Resources\Admin\FeaturedCourseResource;
use App\Models\FeaturedCourse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturedCourseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('featured_course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedCourseResource(FeaturedCourse::with(['courses'])->get());
    }

    public function store(StoreFeaturedCourseRequest $request)
    {
        $featuredCourse = FeaturedCourse::create($request->all());
        $featuredCourse->courses()->sync($request->input('courses', []));

        return (new FeaturedCourseResource($featuredCourse))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FeaturedCourse $featuredCourse)
    {
        abort_if(Gate::denies('featured_course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedCourseResource($featuredCourse->load(['courses']));
    }

    public function update(UpdateFeaturedCourseRequest $request, FeaturedCourse $featuredCourse)
    {
        $featuredCourse->update($request->all());
        $featuredCourse->courses()->sync($request->input('courses', []));

        return (new FeaturedCourseResource($featuredCourse))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FeaturedCourse $featuredCourse)
    {
        abort_if(Gate::denies('featured_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredCourse->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
