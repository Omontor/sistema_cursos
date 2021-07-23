@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indexReason.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-reasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indexReason.fields.id') }}
                        </th>
                        <td>
                            {{ $indexReason->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexReason.fields.title') }}
                        </th>
                        <td>
                            {{ $indexReason->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexReason.fields.content') }}
                        </th>
                        <td>
                            {{ $indexReason->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexReason.fields.icon') }}
                        </th>
                        <td>
                            {{ $indexReason->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexReason.fields.link') }}
                        </th>
                        <td>
                            {{ $indexReason->link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-reasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection