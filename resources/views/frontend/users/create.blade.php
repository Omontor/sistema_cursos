@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.users.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="avatar">{{ trans('cruds.user.fields.avatar') }}</label>
                            <div class="needsclick dropzone" id="avatar-dropzone">
                            </div>
                            @if($errors->has('avatar'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('avatar') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.avatar_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook">{{ trans('cruds.user.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                            @if($errors->has('facebook'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter">{{ trans('cruds.user.fields.twitter') }}</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                            @if($errors->has('twitter'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.twitter_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram">{{ trans('cruds.user.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="website">{{ trans('cruds.user.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', '') }}">
                            @if($errors->has('website'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.website_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bio">{{ trans('cruds.user.fields.bio') }}</label>
                            <textarea class="form-control" name="bio" id="bio">{{ old('bio') }}</textarea>
                            @if($errors->has('bio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.bio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="career">{{ trans('cruds.user.fields.career') }}</label>
                            <input class="form-control" type="text" name="career" id="career" value="{{ old('career', '') }}">
                            @if($errors->has('career'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('career') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.career_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="linkedin">{{ trans('cruds.user.fields.linkedin') }}</label>
                            <input class="form-control" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                            @if($errors->has('linkedin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('linkedin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.linkedin_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.avatarDropzone = {
    url: '{{ route('frontend.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="avatar"]').remove()
      $('form').append('<input type="hidden" name="avatar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="avatar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->avatar)
      var file = {!! json_encode($user->avatar) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="avatar" value="' + file.file_name + '">')
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