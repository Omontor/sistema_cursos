@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.ctum.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cta.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $ctum->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.tagline') }}
                                    </th>
                                    <td>
                                        {{ $ctum->tagline }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $ctum->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.content') }}
                                    </th>
                                    <td>
                                        {{ $ctum->content }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.btn_text') }}
                                    </th>
                                    <td>
                                        {{ $ctum->btn_text }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctum.fields.btn_link') }}
                                    </th>
                                    <td>
                                        {{ $ctum->btn_link }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cta.index') }}">
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