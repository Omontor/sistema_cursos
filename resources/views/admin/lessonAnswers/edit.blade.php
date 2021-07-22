@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lessonAnswer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lesson-answers.update", [$lessonAnswer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('cruds.lessonAnswer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('question_id') ? old('question_id') : $lessonAnswer->question->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonAnswer.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.lessonAnswer.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $lessonAnswer->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonAnswer.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.lessonAnswer.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" required>{{ old('content', $lessonAnswer->content) }}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonAnswer.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection