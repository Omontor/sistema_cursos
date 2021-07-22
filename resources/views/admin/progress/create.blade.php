@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.progress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.progress.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.progress.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progress.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lesson_id">{{ trans('cruds.progress.fields.lesson') }}</label>
                <select class="form-control select2 {{ $errors->has('lesson') ? 'is-invalid' : '' }}" name="lesson_id" id="lesson_id" required>
                    @foreach($lessons as $id => $entry)
                        <option value="{{ $id }}" {{ old('lesson_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson'))
                    <span class="text-danger">{{ $errors->first('lesson') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progress.fields.lesson_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.progress.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progress.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_finished') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_finished" id="is_finished" value="1" required {{ old('is_finished', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_finished">{{ trans('cruds.progress.fields.is_finished') }}</label>
                </div>
                @if($errors->has('is_finished'))
                    <span class="text-danger">{{ $errors->first('is_finished') }}</span>
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



@endsection