<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCertificateRequest;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificates = Certificate::with(['user', 'course'])->get();

        return view('frontend.certificates.index', compact('certificates'));
    }

    public function create()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.certificates.create', compact('users', 'courses'));
    }

    public function store(StoreCertificateRequest $request)
    {
        $certificate = Certificate::create($request->all());

        return redirect()->route('frontend.certificates.index');
    }

    public function edit(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificate->load('user', 'course');

        return view('frontend.certificates.edit', compact('users', 'courses', 'certificate'));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $certificate->update($request->all());

        return redirect()->route('frontend.certificates.index');
    }

    public function show(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->load('user', 'course');

        return view('frontend.certificates.show', compact('certificate'));
    }

    public function destroy(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificateRequest $request)
    {
        Certificate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
