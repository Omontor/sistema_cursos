<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('perfil_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/wishlists*") ? "menu-open" : "" }} {{ request()->is("admin/progress*") ? "menu-open" : "" }} {{ request()->is("admin/certificates*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-user-circle">

                            </i>
                            <p>
                                {{ trans('cruds.perfil.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('wishlist_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.wishlists.index") }}" class="nav-link {{ request()->is("admin/wishlists") || request()->is("admin/wishlists/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list-ol">

                                        </i>
                                        <p>
                                            {{ trans('cruds.wishlist.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('progress_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.progress.index") }}" class="nav-link {{ request()->is("admin/progress") || request()->is("admin/progress/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shoe-prints">

                                        </i>
                                        <p>
                                            {{ trans('cruds.progress.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('certificate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.certificates.index") }}" class="nav-link {{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-medal">

                                        </i>
                                        <p>
                                            {{ trans('cruds.certificate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('lm_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/course-categories*") ? "menu-open" : "" }} {{ request()->is("admin/courses*") ? "menu-open" : "" }} {{ request()->is("admin/lessons*") ? "menu-open" : "" }} {{ request()->is("admin/requirments*") ? "menu-open" : "" }} {{ request()->is("admin/skills*") ? "menu-open" : "" }} {{ request()->is("admin/reviews*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.lm.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('course_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-categories.index") }}" class="nav-link {{ request()->is("admin/course-categories") || request()->is("admin/course-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bars">

                                        </i>
                                        <p>
                                            {{ trans('cruds.courseCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.course.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lesson_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lesson.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('requirment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.requirments.index") }}" class="nav-link {{ request()->is("admin/requirments") || request()->is("admin/requirments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-puzzle-piece">

                                        </i>
                                        <p>
                                            {{ trans('cruds.requirment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('skill_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.skills.index") }}" class="nav-link {{ request()->is("admin/skills") || request()->is("admin/skills/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-spock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.skill.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('review_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reviews.index") }}" class="nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.review.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('prueba_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tests*") ? "menu-open" : "" }} {{ request()->is("admin/questions*") ? "menu-open" : "" }} {{ request()->is("admin/question-options*") ? "menu-open" : "" }} {{ request()->is("admin/test-answers*") ? "menu-open" : "" }} {{ request()->is("admin/test-results*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-check-square">

                            </i>
                            <p>
                                {{ trans('cruds.prueba.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('test_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tests.index") }}" class="nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clone">

                                        </i>
                                        <p>
                                            {{ trans('cruds.test.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.question.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('question_option_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.question-options.index") }}" class="nav-link {{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.questionOption.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('test_answer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.test-answers.index") }}" class="nav-link {{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-edit">

                                        </i>
                                        <p>
                                            {{ trans('cruds.testAnswer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('test_result_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.test-results.index") }}" class="nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star-half-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.testResult.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('virtual_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/online-classes*") ? "menu-open" : "" }} {{ request()->is("admin/reservations*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-chalkboard-teacher">

                            </i>
                            <p>
                                {{ trans('cruds.virtual.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('online_class_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.online-classes.index") }}" class="nav-link {{ request()->is("admin/online-classes") || request()->is("admin/online-classes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tv">

                                        </i>
                                        <p>
                                            {{ trans('cruds.onlineClass.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reservation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reservations.index") }}" class="nav-link {{ request()->is("admin/reservations") || request()->is("admin/reservations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.reservation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('faq_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/faq-categories*") ? "menu-open" : "" }} {{ request()->is("admin/faq-questions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-question">

                            </i>
                            <p>
                                {{ trans('cruds.faqManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('faq_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('forum_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/forum-threads*") ? "menu-open" : "" }} {{ request()->is("admin/forum-comments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fab fa-forumbee">

                            </i>
                            <p>
                                {{ trans('cruds.forum.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('forum_thread_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.forum-threads.index") }}" class="nav-link {{ request()->is("admin/forum-threads") || request()->is("admin/forum-threads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comment-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.forumThread.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('forum_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.forum-comments.index") }}" class="nav-link {{ request()->is("admin/forum-comments") || request()->is("admin/forum-comments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comments">

                                        </i>
                                        <p>
                                            {{ trans('cruds.forumComment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('comunicacion_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/blogs*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }} {{ request()->is("admin/lesson-questions*") ? "menu-open" : "" }} {{ request()->is("admin/lesson-answers*") ? "menu-open" : "" }} {{ request()->is("admin/contact-forms*") ? "menu-open" : "" }} {{ request()->is("admin/post-comments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-newspaper">

                            </i>
                            <p>
                                {{ trans('cruds.comunicacion.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('blog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blogs.index") }}" class="nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-rss">

                                        </i>
                                        <p>
                                            {{ trans('cruds.blog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lesson_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lesson-questions.index") }}" class="nav-link {{ request()->is("admin/lesson-questions") || request()->is("admin/lesson-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-question-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lessonQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lesson_answer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lesson-answers.index") }}" class="nav-link {{ request()->is("admin/lesson-answers") || request()->is("admin/lesson-answers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comment-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lessonAnswer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_form_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contact-forms.index") }}" class="nav-link {{ request()->is("admin/contact-forms") || request()->is("admin/contact-forms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-envelope-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactForm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('post_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.post-comments.index") }}" class="nav-link {{ request()->is("admin/post-comments") || request()->is("admin/post-comments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-font">

                                        </i>
                                        <p>
                                            {{ trans('cruds.postComment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('compra_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/enrollments*") ? "menu-open" : "" }} {{ request()->is("admin/transactions*") ? "menu-open" : "" }} {{ request()->is("admin/payments*") ? "menu-open" : "" }} {{ request()->is("admin/coupons*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-money-bill-alt">

                            </i>
                            <p>
                                {{ trans('cruds.compra.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('enrollment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.enrollments.index") }}" class="nav-link {{ request()->is("admin/enrollments") || request()->is("admin/enrollments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.enrollment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.payment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.coupons.index") }}" class="nav-link {{ request()->is("admin/coupons") || request()->is("admin/coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coupon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('configuration_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/companies*") ? "menu-open" : "" }} {{ request()->is("admin/social-networks*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.configuration.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('company_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is("admin/companies") || request()->is("admin/companies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-pied-piper-hat">

                                        </i>
                                        <p>
                                            {{ trans('cruds.company.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('social_network_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.social-networks.index") }}" class="nav-link {{ request()->is("admin/social-networks") || request()->is("admin/social-networks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-pied-piper">

                                        </i>
                                        <p>
                                            {{ trans('cruds.socialNetwork.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/sliders*") ? "menu-open" : "" }} {{ request()->is("admin/bullets*") ? "menu-open" : "" }} {{ request()->is("admin/featured-courses*") ? "menu-open" : "" }} {{ request()->is("admin/index-abouts*") ? "menu-open" : "" }} {{ request()->is("admin/index-reasons*") ? "menu-open" : "" }} {{ request()->is("admin/index-testimonials*") ? "menu-open" : "" }} {{ request()->is("admin/cta*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fab fa-pied-piper-pp">

                                        </i>
                                        <p>
                                            {{ trans('cruds.content.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('slider_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-images">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.slider.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('bullet_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.bullets.index") }}" class="nav-link {{ request()->is("admin/bullets") || request()->is("admin/bullets/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-dot-circle">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.bullet.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('featured_course_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.featured-courses.index") }}" class="nav-link {{ request()->is("admin/featured-courses") || request()->is("admin/featured-courses/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-medapps">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.featuredCourse.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('index_about_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.index-abouts.index") }}" class="nav-link {{ request()->is("admin/index-abouts") || request()->is("admin/index-abouts/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-font">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.indexAbout.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('index_reason_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.index-reasons.index") }}" class="nav-link {{ request()->is("admin/index-reasons") || request()->is("admin/index-reasons/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-boxes">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.indexReason.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('index_testimonial_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.index-testimonials.index") }}" class="nav-link {{ request()->is("admin/index-testimonials") || request()->is("admin/index-testimonials/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-gavel">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.indexTestimonial.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('ctum_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.cta.index") }}" class="nav-link {{ request()->is("admin/cta") || request()->is("admin/cta/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-autoprefixer">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.ctum.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('about_content_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/abouts*") ? "menu-open" : "" }} {{ request()->is("admin/selling-points*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-users-cog">

                                        </i>
                                        <p>
                                            {{ trans('cruds.aboutContent.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('about_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.abouts.index") }}" class="nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-pied-piper-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.about.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('selling_point_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.selling-points.index") }}" class="nav-link {{ request()->is("admin/selling-points") || request()->is("admin/selling-points/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-check-double">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.sellingPoint.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('static_page_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/pages*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.staticPage.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('page_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.pages.index") }}" class="nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-file-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.page.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('api_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/newsletters*") ? "menu-open" : "" }} {{ request()->is("admin/zooms*") ? "menu-open" : "" }} {{ request()->is("admin/paypals*") ? "menu-open" : "" }} {{ request()->is("admin/stripes*") ? "menu-open" : "" }} {{ request()->is("admin/sendinblues*") ? "menu-open" : "" }} {{ request()->is("admin/googles*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-exchange-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.api.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('newsletter_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.newsletters.index") }}" class="nav-link {{ request()->is("admin/newsletters") || request()->is("admin/newsletters/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-mailchimp">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.newsletter.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('zoom_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.zooms.index") }}" class="nav-link {{ request()->is("admin/zooms") || request()->is("admin/zooms/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-headset">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.zoom.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('paypal_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.paypals.index") }}" class="nav-link {{ request()->is("admin/paypals") || request()->is("admin/paypals/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-cc-paypal">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.paypal.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('stripe_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.stripes.index") }}" class="nav-link {{ request()->is("admin/stripes") || request()->is("admin/stripes/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-cc-stripe">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.stripe.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('sendinblue_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.sendinblues.index") }}" class="nav-link {{ request()->is("admin/sendinblues") || request()->is("admin/sendinblues/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-envelope">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.sendinblue.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('google_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.googles.index") }}" class="nav-link {{ request()->is("admin/googles") || request()->is("admin/googles/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-google">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.google.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>