@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.onlineClass.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.online-classes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.course') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->course->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.id_reunion') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->id_reunion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.excerpt') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->excerpt }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.content') }}
                                    </th>
                                    <td>
                                        {!! $onlineClass->content !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.duration') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.classroom') }}
                                    </th>
                                    <td>
                                        {{ App\Models\OnlineClass::CLASSROOM_SELECT[$onlineClass->classroom] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.password') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.max_student') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->max_student }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.onlineClass.fields.start') }}
                                    </th>
                                    <td>
                                        {{ $onlineClass->start }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.online-classes.index') }}">
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