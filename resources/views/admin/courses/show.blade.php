@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.course.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.teacher') }}
                        </th>
                        <td>
                            {{ $course->teacher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <td>
                            {{ $course->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <td>
                            {{ $course->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.price') }}
                        </th>
                        <td>
                            {{ $course->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.thumbnail') }}
                        </th>
                        <td>
                            @foreach($course->thumbnail as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.is_published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $course->is_published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.students') }}
                        </th>
                        <td>
                            @foreach($course->students as $key => $students)
                                <span class="label label-info">{{ $students->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.requirements') }}
                        </th>
                        <td>
                            @foreach($course->requirements as $key => $requirements)
                                <span class="label label-info">{{ $requirements->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.video') }}
                        </th>
                        <td>
                            {{ $course->video }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
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
            <a class="nav-link" href="#course_reviews" role="tab" data-toggle="tab">
                {{ trans('cruds.review.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_wishlists" role="tab" data-toggle="tab">
                {{ trans('cruds.wishlist.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_certificates" role="tab" data-toggle="tab">
                {{ trans('cruds.certificate.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_online_classes" role="tab" data-toggle="tab">
                {{ trans('cruds.onlineClass.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_reservations" role="tab" data-toggle="tab">
                {{ trans('cruds.reservation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_enrollments" role="tab" data-toggle="tab">
                {{ trans('cruds.enrollment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_purchased_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="course_reviews">
            @includeIf('admin.courses.relationships.courseReviews', ['reviews' => $course->courseReviews])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_wishlists">
            @includeIf('admin.courses.relationships.courseWishlists', ['wishlists' => $course->courseWishlists])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_certificates">
            @includeIf('admin.courses.relationships.courseCertificates', ['certificates' => $course->courseCertificates])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_online_classes">
            @includeIf('admin.courses.relationships.courseOnlineClasses', ['onlineClasses' => $course->courseOnlineClasses])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_reservations">
            @includeIf('admin.courses.relationships.courseReservations', ['reservations' => $course->courseReservations])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_enrollments">
            @includeIf('admin.courses.relationships.courseEnrollments', ['enrollments' => $course->courseEnrollments])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_purchased_transactions">
            @includeIf('admin.courses.relationships.coursePurchasedTransactions', ['transactions' => $course->coursePurchasedTransactions])
        </div>
    </div>
</div>

@endsection