@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bullet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bullets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bullet.fields.id') }}
                        </th>
                        <td>
                            {{ $bullet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bullet.fields.title') }}
                        </th>
                        <td>
                            {{ $bullet->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bullet.fields.content') }}
                        </th>
                        <td>
                            {{ $bullet->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bullet.fields.icon') }}
                        </th>
                        <td>
                            {{ $bullet->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bullet.fields.link') }}
                        </th>
                        <td>
                            {{ $bullet->link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bullets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection