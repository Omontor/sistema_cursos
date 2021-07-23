@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.sellingPoint.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.selling-points.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sellingPoint.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sellingPoint->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sellingPoint.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $sellingPoint->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sellingPoint.fields.content') }}
                                    </th>
                                    <td>
                                        {{ $sellingPoint->content }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sellingPoint.fields.image') }}
                                    </th>
                                    <td>
                                        @if($sellingPoint->image)
                                            <a href="{{ $sellingPoint->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $sellingPoint->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.selling-points.index') }}">
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