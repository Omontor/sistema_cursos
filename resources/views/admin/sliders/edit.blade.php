@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sliders.update", [$slider->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="hero_title">{{ trans('cruds.slider.fields.hero_title') }}</label>
                <input class="form-control {{ $errors->has('hero_title') ? 'is-invalid' : '' }}" type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', $slider->hero_title) }}">
                @if($errors->has('hero_title'))
                    <span class="text-danger">{{ $errors->first('hero_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.hero_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hero_subtitle">{{ trans('cruds.slider.fields.hero_subtitle') }}</label>
                <input class="form-control {{ $errors->has('hero_subtitle') ? 'is-invalid' : '' }}" type="text" name="hero_subtitle" id="hero_subtitle" value="{{ old('hero_subtitle', $slider->hero_subtitle) }}">
                @if($errors->has('hero_subtitle'))
                    <span class="text-danger">{{ $errors->first('hero_subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.hero_subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.slider.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', $slider->button_text) }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_url">{{ trans('cruds.slider.fields.button_url') }}</label>
                <input class="form-control {{ $errors->has('button_url') ? 'is-invalid' : '' }}" type="text" name="button_url" id="button_url" value="{{ old('button_url', $slider->button_url) }}">
                @if($errors->has('button_url'))
                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.button_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bottom_text">{{ trans('cruds.slider.fields.bottom_text') }}</label>
                <input class="form-control {{ $errors->has('bottom_text') ? 'is-invalid' : '' }}" type="text" name="bottom_text" id="bottom_text" value="{{ old('bottom_text', $slider->bottom_text) }}">
                @if($errors->has('bottom_text'))
                    <span class="text-danger">{{ $errors->first('bottom_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.bottom_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.slider.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.image_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.sliders.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slider) && $slider->image)
      var file = {!! json_encode($slider->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection