<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonQuestionRequest;
use App\Http\Requests\UpdateLessonQuestionRequest;
use App\Http\Resources\Admin\LessonQuestionResource;
use App\Models\LessonQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonQuestionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonQuestionResource(LessonQuestion::with(['user', 'lesson'])->get());
    }

    public function store(StoreLessonQuestionRequest $request)
    {
        $lessonQuestion = LessonQuestion::create($request->all());

        return (new LessonQuestionResource($lessonQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LessonQuestion $lessonQuestion)
    {
        abort_if(Gate::denies('lesson_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonQuestionResource($lessonQuestion->load(['user', 'lesson']));
    }

    public function update(UpdateLessonQuestionRequest $request, LessonQuestion $lessonQuestion)
    {
        $lessonQuestion->update($request->all());

        return (new LessonQuestionResource($lessonQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LessonQuestion $lessonQuestion)
    {
        abort_if(Gate::denies('lesson_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonQuestion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
