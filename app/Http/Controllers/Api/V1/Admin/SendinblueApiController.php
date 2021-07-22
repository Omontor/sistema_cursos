<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSendinblueRequest;
use App\Http\Requests\UpdateSendinblueRequest;
use App\Http\Resources\Admin\SendinblueResource;
use App\Models\Sendinblue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendinblueApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sendinblue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SendinblueResource(Sendinblue::all());
    }

    public function store(StoreSendinblueRequest $request)
    {
        $sendinblue = Sendinblue::create($request->all());

        return (new SendinblueResource($sendinblue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sendinblue $sendinblue)
    {
        abort_if(Gate::denies('sendinblue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SendinblueResource($sendinblue);
    }

    public function update(UpdateSendinblueRequest $request, Sendinblue $sendinblue)
    {
        $sendinblue->update($request->all());

        return (new SendinblueResource($sendinblue))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sendinblue $sendinblue)
    {
        abort_if(Gate::denies('sendinblue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendinblue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
