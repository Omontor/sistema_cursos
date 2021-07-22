@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.enrollment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.enrollments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.enrollment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.enrollment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="enrollment_date">{{ trans('cruds.enrollment.fields.enrollment_date') }}</label>
                <input class="form-control date {{ $errors->has('enrollment_date') ? 'is-invalid' : '' }}" type="text" name="enrollment_date" id="enrollment_date" value="{{ old('enrollment_date') }}" required>
                @if($errors->has('enrollment_date'))
                    <span class="text-danger">{{ $errors->first('enrollment_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.enrollment.fields.enrollment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.enrollment.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.enrollment.fields.course_helper') }}</span>
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