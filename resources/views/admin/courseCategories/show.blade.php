@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $courseCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $courseCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.icon') }}
                        </th>
                        <td>
                            @if($courseCategory->icon)
                                <a href="{{ $courseCategory->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $courseCategory->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#category_blogs" role="tab" data-toggle="tab">
                {{ trans('cruds.blog.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_blogs">
            @includeIf('admin.courseCategories.relationships.categoryBlogs', ['blogs' => $courseCategory->categoryBlogs])
        </div>
    </div>
</div>

@endsection