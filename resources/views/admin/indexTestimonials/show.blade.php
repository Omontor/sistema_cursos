@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indexTestimonial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-testimonials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indexTestimonial.fields.id') }}
                        </th>
                        <td>
                            {{ $indexTestimonial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexTestimonial.fields.user') }}
                        </th>
                        <td>
                            {{ $indexTestimonial->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indexTestimonial.fields.content') }}
                        </th>
                        <td>
                            {{ $indexTestimonial->content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.index-testimonials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection