@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.sendinblue.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sendinblues.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.host') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->host }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.api') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->api }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.password') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.security') }}
                                    </th>
                                    <td>
                                        {{ $sendinblue->security }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sendinblues.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection