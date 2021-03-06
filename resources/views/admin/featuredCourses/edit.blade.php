@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.featuredCourse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.featured-courses.update", [$featuredCourse->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="courses">{{ trans('cruds.featuredCourse.fields.course') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('courses') ? 'is-invalid' : '' }}" name="courses[]" id="courses" multiple>
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (in_array($id, old('courses', [])) || $featuredCourse->courses->contains($id)) ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('courses'))
                    <span class="text-danger">{{ $errors->first('courses') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.featuredCourse.fields.course_helper') }}</span>
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