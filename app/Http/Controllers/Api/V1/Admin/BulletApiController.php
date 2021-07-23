<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBulletRequest;
use App\Http\Requests\UpdateBulletRequest;
use App\Http\Resources\Admin\BulletResource;
use App\Models\Bullet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BulletApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bullet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BulletResource(Bullet::all());
    }

    public function store(StoreBulletRequest $request)
    {
        $bullet = Bullet::create($request->all());

        return (new BulletResource($bullet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bullet $bullet)
    {
        abort_if(Gate::denies('bullet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BulletResource($bullet);
    }

    public function update(UpdateBulletRequest $request, Bullet $bullet)
    {
        $bullet->update($request->all());

        return (new BulletResource($bullet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bullet $bullet)
    {
        abort_if(Gate::denies('bullet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bullet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
