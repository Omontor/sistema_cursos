@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.enrollment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.enrollments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.enrollment.fields.id') }}
                        </th>
                        <td>
                            {{ $enrollment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrollment.fields.user') }}
                        </th>
                        <td>
                            {{ $enrollment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrollment.fields.enrollment_date') }}
                        </th>
                        <td>
                            {{ $enrollment->enrollment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrollment.fields.course') }}
                        </th>
                        <td>
                            {{ $enrollment->course->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.enrollments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection