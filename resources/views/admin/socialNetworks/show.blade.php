@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.socialNetwork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-networks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.socialNetwork.fields.id') }}
                        </th>
                        <td>
                            {{ $socialNetwork->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialNetwork.fields.name') }}
                        </th>
                        <td>
                            {{ $socialNetwork->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialNetwork.fields.url') }}
                        </th>
                        <td>
                            {{ $socialNetwork->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialNetwork.fields.icon') }}
                        </th>
                        <td>
                            {{ $socialNetwork->icon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-networks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection