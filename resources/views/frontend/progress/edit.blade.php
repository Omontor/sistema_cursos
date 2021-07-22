@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.progress.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.progress.update", [$progress->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.progress.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $progress->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.progress.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="lesson_id">{{ trans('cruds.progress.fields.lesson') }}</label>
                            <select class="form-control select2" name="lesson_id" id="lesson_id" required>
                                @foreach($lessons as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('lesson_id') ? old('lesson_id') : $progress->lesson->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lesson'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lesson') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.progress.fields.lesson_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.progress.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $progress->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.progress.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="checkbox" name="is_finished" id="is_finished" value="1" {{ $progress->is_finished || old('is_finished', 0) === 1 ? 'checked' : '' }} required>
                                <label class="required" for="is_finished">{{ trans('cruds.progress.fields.is_finished') }}</label>
                            </div>
                            @if($errors->has('is_finished'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_finished') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.progress.fields.is_finished_helper') }}</span>
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