<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonAnswerRequest;
use App\Http\Requests\UpdateLessonAnswerRequest;
use App\Http\Resources\Admin\LessonAnswerResource;
use App\Models\LessonAnswer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonAnswerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonAnswerResource(LessonAnswer::with(['question', 'user', 'created_by'])->get());
    }

    public function store(StoreLessonAnswerRequest $request)
    {
        $lessonAnswer = LessonAnswer::create($request->all());

        return (new LessonAnswerResource($lessonAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LessonAnswer $lessonAnswer)
    {
        abort_if(Gate::denies('lesson_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonAnswerResource($lessonAnswer->load(['question', 'user', 'created_by']));
    }

    public function update(UpdateLessonAnswerRequest $request, LessonAnswer $lessonAnswer)
    {
        $lessonAnswer->update($request->all());

        return (new LessonAnswerResource($lessonAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LessonAnswer $lessonAnswer)
    {
        abort_if(Gate::denies('lesson_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonAnswer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
