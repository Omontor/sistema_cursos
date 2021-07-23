@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indexAbout.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indexAbout.fields.id') }}
                        </th>
                        <td>
                            {{ $indexAbout->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexAbout.fields.title') }}
                        </th>
                        <td>
                            {{ $indexAbout->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexAbout.fields.content') }}
                        </th>
                        <td>
                            {!! $indexAbout->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexAbout.fields.video_url') }}
                        </th>
                        <td>
                            {{ $indexAbout->video_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection