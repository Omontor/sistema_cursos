<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndexTestimonialRequest;
use App\Http\Requests\UpdateIndexTestimonialRequest;
use App\Http\Resources\Admin\IndexTestimonialResource;
use App\Models\IndexTestimonial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexTestimonialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('index_testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexTestimonialResource(IndexTestimonial::with(['user'])->get());
    }

    public function store(StoreIndexTestimonialRequest $request)
    {
        $indexTestimonial = IndexTestimonial::create($request->all());

        return (new IndexTestimonialResource($indexTestimonial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IndexTestimonial $indexTestimonial)
    {
        abort_if(Gate::denies('index_testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexTestimonialResource($indexTestimonial->load(['user']));
    }

    public function update(UpdateIndexTestimonialRequest $request, IndexTestimonial $indexTestimonial)
    {
        $indexTestimonial->update($request->all());

        return (new IndexTestimonialResource($indexTestimonial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IndexTestimonial $indexTestimonial)
    {
        abort_if(Gate::denies('index_testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexTestimonial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
