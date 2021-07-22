@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.lessonQuestion.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.lesson-questions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.lessonQuestion.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lessonQuestion.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="lesson_id">{{ trans('cruds.lessonQuestion.fields.lesson') }}</label>
                            <select class="form-control select2" name="lesson_id" id="lesson_id" required>
                                @foreach($lessons as $id => $entry)
                                    <option value="{{ $id }}" {{ old('lesson_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lesson'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lesson') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lessonQuestion.fields.lesson_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="content">{{ trans('cruds.lessonQuestion.fields.content') }}</label>
                            <textarea class="form-control" name="content" id="content" required>{{ old('content') }}</textarea>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection