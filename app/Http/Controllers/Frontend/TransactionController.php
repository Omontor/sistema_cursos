<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::with(['course_purchaseds', 'user', 'payment_type'])->get();

        return view('frontend.transactions.index', compact('transactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_purchaseds = Course::all()->pluck('title', 'id');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_types = Payment::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.transactions.create', compact('course_purchaseds', 'users', 'payment_types'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());
        $transaction->course_purchaseds()->sync($request->input('course_purchaseds', []));

        return redirect()->route('frontend.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_purchaseds = Course::all()->pluck('title', 'id');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_types = Payment::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('course_purchaseds', 'user', 'payment_type');

        return view('frontend.transactions.edit', compact('course_purchaseds', 'users', 'payment_types', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        $transaction->course_purchaseds()->sync($request->input('course_purchaseds', []));

        return redirect()->route('frontend.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('course_purchaseds', 'user', 'payment_type');

        return view('frontend.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
