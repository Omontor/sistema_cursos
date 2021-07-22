<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonQuestionRequest;
use App\Http\Requests\StoreLessonQuestionRequest;
use App\Http\Requests\UpdateLessonQuestionRequest;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonQuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonQuestions = LessonQuestion::with(['user', 'lesson'])->get();

        return view('admin.lessonQuestions.index', compact('lessonQuestions'));
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessonQuestions.create', compact('users', 'lessons'));
    }

    public function store(StoreLessonQuestionRequest $request)
    {
        $lessonQuestion = LessonQuestion::create($request->all());

        return redirect()->route('admin.lesson-questions.index');
    }

    public function edit(LessonQuestion $lessonQuestion)
    {
        abort_if(Gate::denies('lesson_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessonQuestion->load('user', 'lesson');

        return view('admin.lessonQuestions.edit', compact('users', 'lessons', 'lessonQuestion'));
    }

    public function update(UpdateLessonQuestionRequest $request, LessonQuestion $lessonQuestion)
    {
        $lessonQuestion->update($request->all());

        return redirect()->route('admin.lesson-questions.index');
    }

    public function show(LessonQuestion $lessonQuestion)
    {
        abort_if(Gate::denies('lesson_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonQuestion->load('user', 'lesson', 'questionLessonAnswers');

        return view('admin.lessonQuestions.show', compact('lessonQuestion'));
    }

    public function destroy(LessonQuestion $lessonQuestion)
    {
        abort_if(Gate::denies('lesson_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonQuestionRequest $request)
    {
        LessonQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
