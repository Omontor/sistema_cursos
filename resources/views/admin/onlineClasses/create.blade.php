@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.onlineClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.online-classes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.onlineClass.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_reunion">{{ trans('cruds.onlineClass.fields.id_reunion') }}</label>
                <input class="form-control {{ $errors->has('id_reunion') ? 'is-invalid' : '' }}" type="text" name="id_reunion" id="id_reunion" value="{{ old('id_reunion', '') }}">
                @if($errors->has('id_reunion'))
                    <span class="text-danger">{{ $errors->first('id_reunion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.id_reunion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.onlineClass.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="excerpt">{{ trans('cruds.onlineClass.fields.excerpt') }}</label>
                <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>
                @if($errors->has('excerpt'))
                    <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.excerpt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.onlineClass.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content') !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.onlineClass.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', '') }}" step="1" required>
                @if($errors->has('duration'))
                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.onlineClass.fields.classroom') }}</label>
                <select class="form-control {{ $errors->has('classroom') ? 'is-invalid' : '' }}" name="classroom" id="classroom">
                    <option value disabled {{ old('classroom', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OnlineClass::CLASSROOM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('classroom', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('classroom'))
                    <span class="text-danger">{{ $errors->first('classroom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.classroom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.onlineClass.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="max_student">{{ trans('cruds.onlineClass.fields.max_student') }}</label>
                <input class="form-control {{ $errors->has('max_student') ? 'is-invalid' : '' }}" type="number" name="max_student" id="max_student" value="{{ old('max_student', '') }}" step="1" required>
                @if($errors->has('max_student'))
                    <span class="text-danger">{{ $errors->first('max_student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.max_student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start">{{ trans('cruds.onlineClass.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}" required>
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.onlineClass.fields.start_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.online-classes.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $onlineClass->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection