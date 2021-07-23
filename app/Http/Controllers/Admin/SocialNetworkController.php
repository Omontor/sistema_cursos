<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySocialNetworkRequest;
use App\Http\Requests\StoreSocialNetworkRequest;
use App\Http\Requests\UpdateSocialNetworkRequest;
use App\Models\SocialNetwork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialNetworkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_network_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialNetworks = SocialNetwork::all();

        return view('admin.socialNetworks.index', compact('socialNetworks'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_network_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialNetworks.create');
    }

    public function store(StoreSocialNetworkRequest $request)
    {
        $socialNetwork = SocialNetwork::create($request->all());

        return redirect()->route('admin.social-networks.index');
    }

    public function edit(SocialNetwork $socialNetwork)
    {
        abort_if(Gate::denies('social_network_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialNetworks.edit', compact('socialNetwork'));
    }

    public function update(UpdateSocialNetworkRequest $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->update($request->all());

        return redirect()->route('admin.social-networks.index');
    }

    public function show(SocialNetwork $socialNetwork)
    {
        abort_if(Gate::denies('social_network_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialNetworks.show', compact('socialNetwork'));
    }

    public function destroy(SocialNetwork $socialNetwork)
    {
        abort_if(Gate::denies('social_network_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialNetwork->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialNetworkRequest $request)
    {
        SocialNetwork::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
