<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReferralSourceRequest;
use App\Http\Requests\StoreReferralSourceRequest;
use App\Http\Requests\UpdateReferralSourceRequest;
use App\Models\ReferralSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferralSourceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referral_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referralSources = ReferralSource::all();

        return view('frontend.referralSources.index', compact('referralSources'));
    }

    public function create()
    {
        abort_if(Gate::denies('referral_source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.referralSources.create');
    }

    public function store(StoreReferralSourceRequest $request)
    {
        $referralSource = ReferralSource::create($request->all());

        return redirect()->route('frontend.referral-sources.index');
    }

    public function edit(ReferralSource $referralSource)
    {
        abort_if(Gate::denies('referral_source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.referralSources.edit', compact('referralSource'));
    }

    public function update(UpdateReferralSourceRequest $request, ReferralSource $referralSource)
    {
        $referralSource->update($request->all());

        return redirect()->route('frontend.referral-sources.index');
    }

    public function show(ReferralSource $referralSource)
    {
        abort_if(Gate::denies('referral_source_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.referralSources.show', compact('referralSource'));
    }

    public function destroy(ReferralSource $referralSource)
    {
        abort_if(Gate::denies('referral_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referralSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferralSourceRequest $request)
    {
        ReferralSource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
