<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBulletRequest;
use App\Http\Requests\StoreBulletRequest;
use App\Http\Requests\UpdateBulletRequest;
use App\Models\Bullet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BulletController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bullet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bullets = Bullet::all();

        return view('frontend.bullets.index', compact('bullets'));
    }

    public function create()
    {
        abort_if(Gate::denies('bullet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bullets.create');
    }

    public function store(StoreBulletRequest $request)
    {
        $bullet = Bullet::create($request->all());

        return redirect()->route('frontend.bullets.index');
    }

    public function edit(Bullet $bullet)
    {
        abort_if(Gate::denies('bullet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bullets.edit', compact('bullet'));
    }

    public function update(UpdateBulletRequest $request, Bullet $bullet)
    {
        $bullet->update($request->all());

        return redirect()->route('frontend.bullets.index');
    }

    public function show(Bullet $bullet)
    {
        abort_if(Gate::denies('bullet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bullets.show', compact('bullet'));
    }

    public function destroy(Bullet $bullet)
    {
        abort_if(Gate::denies('bullet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bullet->delete();

        return back();
    }

    public function massDestroy(MassDestroyBulletRequest $request)
    {
        Bullet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
