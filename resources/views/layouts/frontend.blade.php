<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('perfil_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.perfil.title') }}
                                        </a>
                                    @endcan
                                    @can('wishlist_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.wishlists.index') }}">
                                            {{ trans('cruds.wishlist.title') }}
                                        </a>
                                    @endcan
                                    @can('progress_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.progress.index') }}">
                                            {{ trans('cruds.progress.title') }}
                                        </a>
                                    @endcan
                                    @can('certificate_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.certificates.index') }}">
                                            {{ trans('cruds.certificate.title') }}
                                        </a>
                                    @endcan
                                    @can('lm_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.lm.title') }}
                                        </a>
                                    @endcan
                                    @can('course_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.course-categories.index') }}">
                                            {{ trans('cruds.courseCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('course_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.courses.index') }}">
                                            {{ trans('cruds.course.title') }}
                                        </a>
                                    @endcan
                                    @can('lesson_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.lessons.index') }}">
                                            {{ trans('cruds.lesson.title') }}
                                        </a>
                                    @endcan
                                    @can('requirment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.requirments.index') }}">
                                            {{ trans('cruds.requirment.title') }}
                                        </a>
                                    @endcan
                                    @can('skill_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.skills.index') }}">
                                            {{ trans('cruds.skill.title') }}
                                        </a>
                                    @endcan
                                    @can('review_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.reviews.index') }}">
                                            {{ trans('cruds.review.title') }}
                                        </a>
                                    @endcan
                                    @can('prueba_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.prueba.title') }}
                                        </a>
                                    @endcan
                                    @can('test_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.tests.index') }}">
                                            {{ trans('cruds.test.title') }}
                                        </a>
                                    @endcan
                                    @can('question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.questions.index') }}">
                                            {{ trans('cruds.question.title') }}
                                        </a>
                                    @endcan
                                    @can('question_option_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.question-options.index') }}">
                                            {{ trans('cruds.questionOption.title') }}
                                        </a>
                                    @endcan
                                    @can('test_answer_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.test-answers.index') }}">
                                            {{ trans('cruds.testAnswer.title') }}
                                        </a>
                                    @endcan
                                    @can('test_result_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.test-results.index') }}">
                                            {{ trans('cruds.testResult.title') }}
                                        </a>
                                    @endcan
                                    @can('virtual_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.virtual.title') }}
                                        </a>
                                    @endcan
                                    @can('online_class_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.online-classes.index') }}">
                                            {{ trans('cruds.onlineClass.title') }}
                                        </a>
                                    @endcan
                                    @can('reservation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.reservations.index') }}">
                                            {{ trans('cruds.reservation.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.faqManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.faq-categories.index') }}">
                                            {{ trans('cruds.faqCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.faq-questions.index') }}">
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </a>
                                    @endcan
                                    @can('comunicacion_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.comunicacion.title') }}
                                        </a>
                                    @endcan
                                    @can('blog_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.blogs.index') }}">
                                            {{ trans('cruds.blog.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('lesson_question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.lesson-questions.index') }}">
                                            {{ trans('cruds.lessonQuestion.title') }}
                                        </a>
                                    @endcan
                                    @can('lesson_answer_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.lesson-answers.index') }}">
                                            {{ trans('cruds.lessonAnswer.title') }}
                                        </a>
                                    @endcan
                                    @can('contact_form_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.contact-forms.index') }}">
                                            {{ trans('cruds.contactForm.title') }}
                                        </a>
                                    @endcan
                                    @can('compra_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.compra.title') }}
                                        </a>
                                    @endcan
                                    @can('enrollment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.enrollments.index') }}">
                                            {{ trans('cruds.enrollment.title') }}
                                        </a>
                                    @endcan
                                    @can('transaction_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transactions.index') }}">
                                            {{ trans('cruds.transaction.title') }}
                                        </a>
                                    @endcan
                                    @can('payment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.payments.index') }}">
                                            {{ trans('cruds.payment.title') }}
                                        </a>
                                    @endcan
                                    @can('coupon_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.coupons.index') }}">
                                            {{ trans('cruds.coupon.title') }}
                                        </a>
                                    @endcan
                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('configuration_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.configuration.title') }}
                                        </a>
                                    @endcan
                                    @can('company_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.companies.index') }}">
                                            {{ trans('cruds.company.title') }}
                                        </a>
                                    @endcan
                                    @can('social_network_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.social-networks.index') }}">
                                            {{ trans('cruds.socialNetwork.title') }}
                                        </a>
                                    @endcan
                                    @can('content_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.content.title') }}
                                        </a>
                                    @endcan
                                    @can('slider_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sliders.index') }}">
                                            {{ trans('cruds.slider.title') }}
                                        </a>
                                    @endcan
                                    @can('bullet_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.bullets.index') }}">
                                            {{ trans('cruds.bullet.title') }}
                                        </a>
                                    @endcan
                                    @can('index_about_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.index-abouts.index') }}">
                                            {{ trans('cruds.indexAbout.title') }}
                                        </a>
                                    @endcan
                                    @can('index_reason_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.index-reasons.index') }}">
                                            {{ trans('cruds.indexReason.title') }}
                                        </a>
                                    @endcan
                                    @can('index_testimonial_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.index-testimonials.index') }}">
                                            {{ trans('cruds.indexTestimonial.title') }}
                                        </a>
                                    @endcan
                                    @can('ctum_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.cta.index') }}">
                                            {{ trans('cruds.ctum.title') }}
                                        </a>
                                    @endcan
                                    @can('featured_course_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.featured-courses.index') }}">
                                            {{ trans('cruds.featuredCourse.title') }}
                                        </a>
                                    @endcan
                                    @can('about_content_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.aboutContent.title') }}
                                        </a>
                                    @endcan
                                    @can('about_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.abouts.index') }}">
                                            {{ trans('cruds.about.title') }}
                                        </a>
                                    @endcan
                                    @can('selling_point_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.selling-points.index') }}">
                                            {{ trans('cruds.sellingPoint.title') }}
                                        </a>
                                    @endcan
                                    @can('static_page_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.staticPage.title') }}
                                        </a>
                                    @endcan
                                    @can('page_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pages.index') }}">
                                            {{ trans('cruds.page.title') }}
                                        </a>
                                    @endcan
                                    @can('api_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.api.title') }}
                                        </a>
                                    @endcan
                                    @can('newsletter_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.newsletters.index') }}">
                                            {{ trans('cruds.newsletter.title') }}
                                        </a>
                                    @endcan
                                    @can('zoom_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.zooms.index') }}">
                                            {{ trans('cruds.zoom.title') }}
                                        </a>
                                    @endcan
                                    @can('paypal_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.paypals.index') }}">
                                            {{ trans('cruds.paypal.title') }}
                                        </a>
                                    @endcan
                                    @can('stripe_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.stripes.index') }}">
                                            {{ trans('cruds.stripe.title') }}
                                        </a>
                                    @endcan
                                    @can('sendinblue_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sendinblues.index') }}">
                                            {{ trans('cruds.sendinblue.title') }}
                                        </a>
                                    @endcan
                                    @can('google_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.googles.index') }}">
                                            {{ trans('cruds.google.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>