@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.enrollment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.enrollments.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.enrollment.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.enrollment.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="enrollment_date">{{ trans('cruds.enrollment.fields.enrollment_date') }}</label>
                            <input class="form-control date" type="text" name="enrollment_date" id="enrollment_date" value="{{ old('enrollment_date') }}" required>
                            @if($errors->has('enrollment_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('enrollment_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.enrollment.fields.enrollment_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.enrollment.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection