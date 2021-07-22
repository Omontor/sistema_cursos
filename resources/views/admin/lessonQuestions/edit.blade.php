@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lessonQuestion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lesson-questions.update", [$lessonQuestion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.lessonQuestion.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $lessonQuestion->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonQuestion.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lesson_id">{{ trans('cruds.lessonQuestion.fields.lesson') }}</label>
                <select class="form-control select2 {{ $errors->has('lesson') ? 'is-invalid' : '' }}" name="lesson_id" id="lesson_id" required>
                    @foreach($lessons as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lesson_id') ? old('lesson_id') : $lessonQuestion->lesson->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson'))
                    <span class="text-danger">{{ $errors->first('lesson') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonQuestion.fields.lesson_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.lessonQuestion.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" required>{{ old('content', $lessonQuestion->content) }}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lessonQuestion.fields.content_helper') }}</span>
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