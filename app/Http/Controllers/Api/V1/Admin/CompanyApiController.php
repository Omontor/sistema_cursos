<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Company;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource(Company::all());
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());

        if ($request->input('logo_white', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_white'))))->toMediaCollection('logo_white');
        }

        if ($request->input('logo_color', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_color'))))->toMediaCollection('logo_color');
        }

        if ($request->input('favicon', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
        }

        if ($request->input('logo', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        if ($request->input('logo_white', false)) {
            if (!$company->logo_white || $request->input('logo_white') !== $company->logo_white->file_name) {
                if ($company->logo_white) {
                    $company->logo_white->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_white'))))->toMediaCollection('logo_white');
            }
        } elseif ($company->logo_white) {
            $company->logo_white->delete();
        }

        if ($request->input('logo_color', false)) {
            if (!$company->logo_color || $request->input('logo_color') !== $company->logo_color->file_name) {
                if ($company->logo_color) {
                    $company->logo_color->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_color'))))->toMediaCollection('logo_color');
            }
        } elseif ($company->logo_color) {
            $company->logo_color->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$company->favicon || $request->input('favicon') !== $company->favicon->file_name) {
                if ($company->favicon) {
                    $company->favicon->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($company->favicon) {
            $company->favicon->delete();
        }

        if ($request->input('logo', false)) {
            if (!$company->logo || $request->input('logo') !== $company->logo->file_name) {
                if ($company->logo) {
                    $company->logo->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($company->logo) {
            $company->logo->delete();
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
