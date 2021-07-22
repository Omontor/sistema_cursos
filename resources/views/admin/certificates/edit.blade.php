@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.certificate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.certificates.update", [$certificate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.certificate.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $certificate->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.certificate.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $certificate->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="finished">{{ trans('cruds.certificate.fields.finished') }}</label>
                <input class="form-control date {{ $errors->has('finished') ? 'is-invalid' : '' }}" type="text" name="finished" id="finished" value="{{ old('finished', $certificate->finished) }}" required>
                @if($errors->has('finished'))
                    <span class="text-danger">{{ $errors->first('finished') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.finished_helper') }}</span>
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