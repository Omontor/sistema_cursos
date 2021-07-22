<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Requirment
    Route::delete('requirments/destroy', 'RequirmentController@massDestroy')->name('requirments.massDestroy');
    Route::resource('requirments', 'RequirmentController');

    // Lesson Question
    Route::delete('lesson-questions/destroy', 'LessonQuestionController@massDestroy')->name('lesson-questions.massDestroy');
    Route::resource('lesson-questions', 'LessonQuestionController');

    // Lesson Answer
    Route::delete('lesson-answers/destroy', 'LessonAnswerController@massDestroy')->name('lesson-answers.massDestroy');
    Route::resource('lesson-answers', 'LessonAnswerController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewController');

    // Course Category
    Route::delete('course-categories/destroy', 'CourseCategoryController@massDestroy')->name('course-categories.massDestroy');
    Route::post('course-categories/media', 'CourseCategoryController@storeMedia')->name('course-categories.storeMedia');
    Route::post('course-categories/ckmedia', 'CourseCategoryController@storeCKEditorImages')->name('course-categories.storeCKEditorImages');
    Route::resource('course-categories', 'CourseCategoryController');

    // Skill
    Route::delete('skills/destroy', 'SkillController@massDestroy')->name('skills.massDestroy');
    Route::post('skills/media', 'SkillController@storeMedia')->name('skills.storeMedia');
    Route::post('skills/ckmedia', 'SkillController@storeCKEditorImages')->name('skills.storeCKEditorImages');
    Route::resource('skills', 'SkillController');

    // Wishlist
    Route::delete('wishlists/destroy', 'WishlistController@massDestroy')->name('wishlists.massDestroy');
    Route::resource('wishlists', 'WishlistController');

    // Progress
    Route::delete('progress/destroy', 'ProgressController@massDestroy')->name('progress.massDestroy');
    Route::resource('progress', 'ProgressController');

    // Certificates
    Route::delete('certificates/destroy', 'CertificatesController@massDestroy')->name('certificates.massDestroy');
    Route::resource('certificates', 'CertificatesController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Zoom
    Route::delete('zooms/destroy', 'ZoomController@massDestroy')->name('zooms.massDestroy');
    Route::resource('zooms', 'ZoomController');

    // Paypal
    Route::delete('paypals/destroy', 'PaypalController@massDestroy')->name('paypals.massDestroy');
    Route::resource('paypals', 'PaypalController');

    // Stripe
    Route::delete('stripes/destroy', 'StripeController@massDestroy')->name('stripes.massDestroy');
    Route::resource('stripes', 'StripeController');

    // Sendinblue
    Route::delete('sendinblues/destroy', 'SendinblueController@massDestroy')->name('sendinblues.massDestroy');
    Route::resource('sendinblues', 'SendinblueController');

    // Google
    Route::delete('googles/destroy', 'GoogleController@massDestroy')->name('googles.massDestroy');
    Route::resource('googles', 'GoogleController');

    // Online Class
    Route::delete('online-classes/destroy', 'OnlineClassController@massDestroy')->name('online-classes.massDestroy');
    Route::post('online-classes/media', 'OnlineClassController@storeMedia')->name('online-classes.storeMedia');
    Route::post('online-classes/ckmedia', 'OnlineClassController@storeCKEditorImages')->name('online-classes.storeCKEditorImages');
    Route::resource('online-classes', 'OnlineClassController');

    // Reservation
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Contact Form
    Route::delete('contact-forms/destroy', 'ContactFormController@massDestroy')->name('contact-forms.massDestroy');
    Route::resource('contact-forms', 'ContactFormController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Coupon
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Enrollment
    Route::delete('enrollments/destroy', 'EnrollmentController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Requirment
    Route::delete('requirments/destroy', 'RequirmentController@massDestroy')->name('requirments.massDestroy');
    Route::resource('requirments', 'RequirmentController');

    // Lesson Question
    Route::delete('lesson-questions/destroy', 'LessonQuestionController@massDestroy')->name('lesson-questions.massDestroy');
    Route::resource('lesson-questions', 'LessonQuestionController');

    // Lesson Answer
    Route::delete('lesson-answers/destroy', 'LessonAnswerController@massDestroy')->name('lesson-answers.massDestroy');
    Route::resource('lesson-answers', 'LessonAnswerController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewController');

    // Course Category
    Route::delete('course-categories/destroy', 'CourseCategoryController@massDestroy')->name('course-categories.massDestroy');
    Route::post('course-categories/media', 'CourseCategoryController@storeMedia')->name('course-categories.storeMedia');
    Route::post('course-categories/ckmedia', 'CourseCategoryController@storeCKEditorImages')->name('course-categories.storeCKEditorImages');
    Route::resource('course-categories', 'CourseCategoryController');

    // Skill
    Route::delete('skills/destroy', 'SkillController@massDestroy')->name('skills.massDestroy');
    Route::post('skills/media', 'SkillController@storeMedia')->name('skills.storeMedia');
    Route::post('skills/ckmedia', 'SkillController@storeCKEditorImages')->name('skills.storeCKEditorImages');
    Route::resource('skills', 'SkillController');

    // Wishlist
    Route::delete('wishlists/destroy', 'WishlistController@massDestroy')->name('wishlists.massDestroy');
    Route::resource('wishlists', 'WishlistController');

    // Progress
    Route::delete('progress/destroy', 'ProgressController@massDestroy')->name('progress.massDestroy');
    Route::resource('progress', 'ProgressController');

    // Certificates
    Route::delete('certificates/destroy', 'CertificatesController@massDestroy')->name('certificates.massDestroy');
    Route::resource('certificates', 'CertificatesController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Zoom
    Route::delete('zooms/destroy', 'ZoomController@massDestroy')->name('zooms.massDestroy');
    Route::resource('zooms', 'ZoomController');

    // Paypal
    Route::delete('paypals/destroy', 'PaypalController@massDestroy')->name('paypals.massDestroy');
    Route::resource('paypals', 'PaypalController');

    // Stripe
    Route::delete('stripes/destroy', 'StripeController@massDestroy')->name('stripes.massDestroy');
    Route::resource('stripes', 'StripeController');

    // Sendinblue
    Route::delete('sendinblues/destroy', 'SendinblueController@massDestroy')->name('sendinblues.massDestroy');
    Route::resource('sendinblues', 'SendinblueController');

    // Google
    Route::delete('googles/destroy', 'GoogleController@massDestroy')->name('googles.massDestroy');
    Route::resource('googles', 'GoogleController');

    // Online Class
    Route::delete('online-classes/destroy', 'OnlineClassController@massDestroy')->name('online-classes.massDestroy');
    Route::post('online-classes/media', 'OnlineClassController@storeMedia')->name('online-classes.storeMedia');
    Route::post('online-classes/ckmedia', 'OnlineClassController@storeCKEditorImages')->name('online-classes.storeCKEditorImages');
    Route::resource('online-classes', 'OnlineClassController');

    // Reservation
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Contact Form
    Route::delete('contact-forms/destroy', 'ContactFormController@massDestroy')->name('contact-forms.massDestroy');
    Route::resource('contact-forms', 'ContactFormController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Coupon
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Enrollment
    Route::delete('enrollments/destroy', 'EnrollmentController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
