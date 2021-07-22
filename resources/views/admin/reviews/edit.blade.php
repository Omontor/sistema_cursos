@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reviews.update", [$review->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.review.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $review->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.review.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $review->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.course_helper') }}</span>
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