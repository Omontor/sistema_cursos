<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaypalRequest;
use App\Http\Requests\UpdatePaypalRequest;
use App\Http\Resources\Admin\PaypalResource;
use App\Models\Paypal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaypalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paypal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaypalResource(Paypal::all());
    }

    public function store(StorePaypalRequest $request)
    {
        $paypal = Paypal::create($request->all());

        return (new PaypalResource($paypal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paypal $paypal)
    {
        abort_if(Gate::denies('paypal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaypalResource($paypal);
    }

    public function update(UpdatePaypalRequest $request, Paypal $paypal)
    {
        $paypal->update($request->all());

        return (new PaypalResource($paypal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paypal $paypal)
    {
        abort_if(Gate::denies('paypal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paypal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
