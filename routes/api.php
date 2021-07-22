<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Requirment
    Route::apiResource('requirments', 'RequirmentApiController');

    // Lesson Question
    Route::apiResource('lesson-questions', 'LessonQuestionApiController');

    // Lesson Answer
    Route::apiResource('lesson-answers', 'LessonAnswerApiController');

    // Review
    Route::apiResource('reviews', 'ReviewApiController');

    // Course Category
    Route::post('course-categories/media', 'CourseCategoryApiController@storeMedia')->name('course-categories.storeMedia');
    Route::apiResource('course-categories', 'CourseCategoryApiController');

    // Skill
    Route::post('skills/media', 'SkillApiController@storeMedia')->name('skills.storeMedia');
    Route::apiResource('skills', 'SkillApiController');

    // Wishlist
    Route::apiResource('wishlists', 'WishlistApiController');

    // Progress
    Route::apiResource('progress', 'ProgressApiController');

    // Certificates
    Route::apiResource('certificates', 'CertificatesApiController');

    // Newsletter
    Route::apiResource('newsletters', 'NewsletterApiController');

    // Zoom
    Route::apiResource('zooms', 'ZoomApiController');

    // Paypal
    Route::apiResource('paypals', 'PaypalApiController');

    // Stripe
    Route::apiResource('stripes', 'StripeApiController');

    // Sendinblue
    Route::apiResource('sendinblues', 'SendinblueApiController');

    // Google
    Route::apiResource('googles', 'GoogleApiController');

    // Online Class
    Route::post('online-classes/media', 'OnlineClassApiController@storeMedia')->name('online-classes.storeMedia');
    Route::apiResource('online-classes', 'OnlineClassApiController');

    // Reservation
    Route::apiResource('reservations', 'ReservationApiController');

    // Contact Form
    Route::apiResource('contact-forms', 'ContactFormApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');

    // Payments
    Route::apiResource('payments', 'PaymentsApiController');

    // Coupon
    Route::apiResource('coupons', 'CouponApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Enrollment
    Route::apiResource('enrollments', 'EnrollmentApiController');
});
