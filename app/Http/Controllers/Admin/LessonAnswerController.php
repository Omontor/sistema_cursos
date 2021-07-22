<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonAnswerRequest;
use App\Http\Requests\StoreLessonAnswerRequest;
use App\Http\Requests\UpdateLessonAnswerRequest;
use App\Models\LessonAnswer;
use App\Models\LessonQuestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonAnswers = LessonAnswer::with(['question', 'user', 'created_by'])->get();

        return view('admin.lessonAnswers.index', compact('lessonAnswers'));
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = LessonQuestion::all()->pluck('content', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessonAnswers.create', compact('questions', 'users'));
    }

    public function store(StoreLessonAnswerRequest $request)
    {
        $lessonAnswer = LessonAnswer::create($request->all());

        return redirect()->route('admin.lesson-answers.index');
    }

    public function edit(LessonAnswer $lessonAnswer)
    {
        abort_if(Gate::denies('lesson_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = LessonQuestion::all()->pluck('content', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessonAnswer->load('question', 'user', 'created_by');

        return view('admin.lessonAnswers.edit', compact('questions', 'users', 'lessonAnswer'));
    }

    public function update(UpdateLessonAnswerRequest $request, LessonAnswer $lessonAnswer)
    {
        $lessonAnswer->update($request->all());

        return redirect()->route('admin.lesson-answers.index');
    }

    public function show(LessonAnswer $lessonAnswer)
    {
        abort_if(Gate::denies('lesson_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonAnswer->load('question', 'user', 'created_by');

        return view('admin.lessonAnswers.show', compact('lessonAnswer'));
    }

    public function destroy(LessonAnswer $lessonAnswer)
    {
        abort_if(Gate::denies('lesson_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonAnswerRequest $request)
    {
        LessonAnswer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
