<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWishlistRequest;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\Wishlist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wishlist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlists = Wishlist::with(['user', 'course'])->get();

        return view('frontend.wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        abort_if(Gate::denies('wishlist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.wishlists.create', compact('users', 'courses'));
    }

    public function store(StoreWishlistRequest $request)
    {
        $wishlist = Wishlist::create($request->all());

        return redirect()->route('frontend.wishlists.index');
    }

    public function edit(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wishlist->load('user', 'course');

        return view('frontend.wishlists.edit', compact('users', 'courses', 'wishlist'));
    }

    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        $wishlist->update($request->all());

        return redirect()->route('frontend.wishlists.index');
    }

    public function show(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlist->load('user', 'course');

        return view('frontend.wishlists.show', compact('wishlist'));
    }

    public function destroy(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlist->delete();

        return back();
    }

    public function massDestroy(MassDestroyWishlistRequest $request)
    {
        Wishlist::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
