<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIndexTestimonialRequest;
use App\Http\Requests\StoreIndexTestimonialRequest;
use App\Http\Requests\UpdateIndexTestimonialRequest;
use App\Models\IndexTestimonial;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexTestimonialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('index_testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexTestimonials = IndexTestimonial::with(['user'])->get();

        return view('frontend.indexTestimonials.index', compact('indexTestimonials'));
    }

    public function create()
    {
        abort_if(Gate::denies('index_testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.indexTestimonials.create', compact('users'));
    }

    public function store(StoreIndexTestimonialRequest $request)
    {
        $indexTestimonial = IndexTestimonial::create($request->all());

        return redirect()->route('frontend.index-testimonials.index');
    }

    public function edit(IndexTestimonial $indexTestimonial)
    {
        abort_if(Gate::denies('index_testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $indexTestimonial->load('user');

        return view('frontend.indexTestimonials.edit', compact('users', 'indexTestimonial'));
    }

    public function update(UpdateIndexTestimonialRequest $request, IndexTestimonial $indexTestimonial)
    {
        $indexTestimonial->update($request->all());

        return redirect()->route('frontend.index-testimonials.index');
    }

    public function show(IndexTestimonial $indexTestimonial)
    {
        abort_if(Gate::denies('index_testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexTestimonial->load('user');

        return view('frontend.indexTestimonials.show', compact('indexTestimonial'));
    }

    public function destroy(IndexTestimonial $indexTestimonial)
    {
        abort_if(Gate::denies('index_testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexTestimonial->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndexTestimonialRequest $request)
    {
        IndexTestimonial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
