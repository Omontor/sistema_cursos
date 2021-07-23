<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialNetworkRequest;
use App\Http\Requests\UpdateSocialNetworkRequest;
use App\Http\Resources\Admin\SocialNetworkResource;
use App\Models\SocialNetwork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialNetworkApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_network_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialNetworkResource(SocialNetwork::all());
    }

    public function store(StoreSocialNetworkRequest $request)
    {
        $socialNetwork = SocialNetwork::create($request->all());

        return (new SocialNetworkResource($socialNetwork))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SocialNetwork $socialNetwork)
    {
        abort_if(Gate::denies('social_network_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialNetworkResource($socialNetwork);
    }

    public function update(UpdateSocialNetworkRequest $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->update($request->all());

        return (new SocialNetworkResource($socialNetwork))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SocialNetwork $socialNetwork)
    {
        abort_if(Gate::denies('social_network_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialNetwork->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
