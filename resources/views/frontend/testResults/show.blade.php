@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.testResult.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.test-results.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.testResult.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $testResult->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.testResult.fields.test') }}
                                    </th>
                                    <td>
                                        {{ $testResult->test->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.testResult.fields.student') }}
                                    </th>
                                    <td>
                                        {{ $testResult->student->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.testResult.fields.score') }}
                                    </th>
                                    <td>
                                        {{ $testResult->score }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.testResult.fields.show') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TestResult::SHOW_SELECT[$testResult->show] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.test-results.index') }}">
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