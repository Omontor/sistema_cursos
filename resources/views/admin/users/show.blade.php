@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.avatar') }}
                        </th>
                        <td>
                            @if($user->avatar)
                                <a href="{{ $user->avatar->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->avatar->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.facebook') }}
                        </th>
                        <td>
                            {{ $user->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.twitter') }}
                        </th>
                        <td>
                            {{ $user->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.instagram') }}
                        </th>
                        <td>
                            {{ $user->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.website') }}
                        </th>
                        <td>
                            {{ $user->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.bio') }}
                        </th>
                        <td>
                            {{ $user->bio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.career') }}
                        </th>
                        <td>
                            {{ $user->career }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $user->linkedin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#user_lesson_questions" role="tab" data-toggle="tab">
                {{ trans('cruds.lessonQuestion.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_lesson_answers" role="tab" data-toggle="tab">
                {{ trans('cruds.lessonAnswer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_wishlists" role="tab" data-toggle="tab">
                {{ trans('cruds.wishlist.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_progress" role="tab" data-toggle="tab">
                {{ trans('cruds.progress.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_certificates" role="tab" data-toggle="tab">
                {{ trans('cruds.certificate.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_reservations" role="tab" data-toggle="tab">
                {{ trans('cruds.reservation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_enrollments" role="tab" data-toggle="tab">
                {{ trans('cruds.enrollment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_index_testimonials" role="tab" data-toggle="tab">
                {{ trans('cruds.indexTestimonial.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_lesson_questions">
            @includeIf('admin.users.relationships.userLessonQuestions', ['lessonQuestions' => $user->userLessonQuestions])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_lesson_answers">
            @includeIf('admin.users.relationships.userLessonAnswers', ['lessonAnswers' => $user->userLessonAnswers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_wishlists">
            @includeIf('admin.users.relationships.userWishlists', ['wishlists' => $user->userWishlists])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_progress">
            @includeIf('admin.users.relationships.userProgress', ['progress' => $user->userProgress])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_certificates">
            @includeIf('admin.users.relationships.userCertificates', ['certificates' => $user->userCertificates])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_reservations">
            @includeIf('admin.users.relationships.userReservations', ['reservations' => $user->userReservations])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_transactions">
            @includeIf('admin.users.relationships.userTransactions', ['transactions' => $user->userTransactions])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_enrollments">
            @includeIf('admin.users.relationships.userEnrollments', ['enrollments' => $user->userEnrollments])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_index_testimonials">
            @includeIf('admin.users.relationships.userIndexTestimonials', ['indexTestimonials' => $user->userIndexTestimonials])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection