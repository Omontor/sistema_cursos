<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsletterRequest;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Models\Newsletter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsletterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newsletter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletters = Newsletter::all();

        return view('frontend.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        abort_if(Gate::denies('newsletter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.newsletters.create');
    }

    public function store(StoreNewsletterRequest $request)
    {
        $newsletter = Newsletter::create($request->all());

        return redirect()->route('frontend.newsletters.index');
    }

    public function edit(Newsletter $newsletter)
    {
        abort_if(Gate::denies('newsletter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.newsletters.edit', compact('newsletter'));
    }

    public function update(UpdateNewsletterRequest $request, Newsletter $newsletter)
    {
        $newsletter->update($request->all());

        return redirect()->route('frontend.newsletters.index');
    }

    public function show(Newsletter $newsletter)
    {
        abort_if(Gate::denies('newsletter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.newsletters.show', compact('newsletter'));
    }

    public function destroy(Newsletter $newsletter)
    {
        abort_if(Gate::denies('newsletter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletter->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsletterRequest $request)
    {
        Newsletter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
