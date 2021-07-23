<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'course_create',
            ],
            [
                'id'    => 22,
                'title' => 'course_edit',
            ],
            [
                'id'    => 23,
                'title' => 'course_show',
            ],
            [
                'id'    => 24,
                'title' => 'course_delete',
            ],
            [
                'id'    => 25,
                'title' => 'course_access',
            ],
            [
                'id'    => 26,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 27,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 28,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 29,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 30,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 31,
                'title' => 'test_create',
            ],
            [
                'id'    => 32,
                'title' => 'test_edit',
            ],
            [
                'id'    => 33,
                'title' => 'test_show',
            ],
            [
                'id'    => 34,
                'title' => 'test_delete',
            ],
            [
                'id'    => 35,
                'title' => 'test_access',
            ],
            [
                'id'    => 36,
                'title' => 'question_create',
            ],
            [
                'id'    => 37,
                'title' => 'question_edit',
            ],
            [
                'id'    => 38,
                'title' => 'question_show',
            ],
            [
                'id'    => 39,
                'title' => 'question_delete',
            ],
            [
                'id'    => 40,
                'title' => 'question_access',
            ],
            [
                'id'    => 41,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 42,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 43,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 44,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 45,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 46,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 47,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 48,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 49,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 50,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 51,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 52,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 53,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 54,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 55,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 56,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 57,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 58,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 59,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 60,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 61,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 62,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 63,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 64,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 65,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 66,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 67,
                'title' => 'comunicacion_access',
            ],
            [
                'id'    => 68,
                'title' => 'lm_access',
            ],
            [
                'id'    => 69,
                'title' => 'prueba_access',
            ],
            [
                'id'    => 70,
                'title' => 'requirment_create',
            ],
            [
                'id'    => 71,
                'title' => 'requirment_edit',
            ],
            [
                'id'    => 72,
                'title' => 'requirment_show',
            ],
            [
                'id'    => 73,
                'title' => 'requirment_delete',
            ],
            [
                'id'    => 74,
                'title' => 'requirment_access',
            ],
            [
                'id'    => 75,
                'title' => 'lesson_question_create',
            ],
            [
                'id'    => 76,
                'title' => 'lesson_question_edit',
            ],
            [
                'id'    => 77,
                'title' => 'lesson_question_show',
            ],
            [
                'id'    => 78,
                'title' => 'lesson_question_delete',
            ],
            [
                'id'    => 79,
                'title' => 'lesson_question_access',
            ],
            [
                'id'    => 80,
                'title' => 'lesson_answer_create',
            ],
            [
                'id'    => 81,
                'title' => 'lesson_answer_edit',
            ],
            [
                'id'    => 82,
                'title' => 'lesson_answer_show',
            ],
            [
                'id'    => 83,
                'title' => 'lesson_answer_delete',
            ],
            [
                'id'    => 84,
                'title' => 'lesson_answer_access',
            ],
            [
                'id'    => 85,
                'title' => 'review_create',
            ],
            [
                'id'    => 86,
                'title' => 'review_edit',
            ],
            [
                'id'    => 87,
                'title' => 'review_show',
            ],
            [
                'id'    => 88,
                'title' => 'review_delete',
            ],
            [
                'id'    => 89,
                'title' => 'review_access',
            ],
            [
                'id'    => 90,
                'title' => 'course_category_create',
            ],
            [
                'id'    => 91,
                'title' => 'course_category_edit',
            ],
            [
                'id'    => 92,
                'title' => 'course_category_show',
            ],
            [
                'id'    => 93,
                'title' => 'course_category_delete',
            ],
            [
                'id'    => 94,
                'title' => 'course_category_access',
            ],
            [
                'id'    => 95,
                'title' => 'skill_create',
            ],
            [
                'id'    => 96,
                'title' => 'skill_edit',
            ],
            [
                'id'    => 97,
                'title' => 'skill_show',
            ],
            [
                'id'    => 98,
                'title' => 'skill_delete',
            ],
            [
                'id'    => 99,
                'title' => 'skill_access',
            ],
            [
                'id'    => 100,
                'title' => 'perfil_access',
            ],
            [
                'id'    => 101,
                'title' => 'wishlist_create',
            ],
            [
                'id'    => 102,
                'title' => 'wishlist_edit',
            ],
            [
                'id'    => 103,
                'title' => 'wishlist_show',
            ],
            [
                'id'    => 104,
                'title' => 'wishlist_delete',
            ],
            [
                'id'    => 105,
                'title' => 'wishlist_access',
            ],
            [
                'id'    => 106,
                'title' => 'progress_create',
            ],
            [
                'id'    => 107,
                'title' => 'progress_edit',
            ],
            [
                'id'    => 108,
                'title' => 'progress_show',
            ],
            [
                'id'    => 109,
                'title' => 'progress_delete',
            ],
            [
                'id'    => 110,
                'title' => 'progress_access',
            ],
            [
                'id'    => 111,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 112,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 113,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 114,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 115,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 116,
                'title' => 'compra_access',
            ],
            [
                'id'    => 117,
                'title' => 'newsletter_create',
            ],
            [
                'id'    => 118,
                'title' => 'newsletter_edit',
            ],
            [
                'id'    => 119,
                'title' => 'newsletter_show',
            ],
            [
                'id'    => 120,
                'title' => 'newsletter_delete',
            ],
            [
                'id'    => 121,
                'title' => 'newsletter_access',
            ],
            [
                'id'    => 122,
                'title' => 'zoom_create',
            ],
            [
                'id'    => 123,
                'title' => 'zoom_edit',
            ],
            [
                'id'    => 124,
                'title' => 'zoom_show',
            ],
            [
                'id'    => 125,
                'title' => 'zoom_delete',
            ],
            [
                'id'    => 126,
                'title' => 'zoom_access',
            ],
            [
                'id'    => 127,
                'title' => 'paypal_create',
            ],
            [
                'id'    => 128,
                'title' => 'paypal_edit',
            ],
            [
                'id'    => 129,
                'title' => 'paypal_show',
            ],
            [
                'id'    => 130,
                'title' => 'paypal_delete',
            ],
            [
                'id'    => 131,
                'title' => 'paypal_access',
            ],
            [
                'id'    => 132,
                'title' => 'stripe_create',
            ],
            [
                'id'    => 133,
                'title' => 'stripe_edit',
            ],
            [
                'id'    => 134,
                'title' => 'stripe_show',
            ],
            [
                'id'    => 135,
                'title' => 'stripe_delete',
            ],
            [
                'id'    => 136,
                'title' => 'stripe_access',
            ],
            [
                'id'    => 137,
                'title' => 'sendinblue_create',
            ],
            [
                'id'    => 138,
                'title' => 'sendinblue_edit',
            ],
            [
                'id'    => 139,
                'title' => 'sendinblue_show',
            ],
            [
                'id'    => 140,
                'title' => 'sendinblue_delete',
            ],
            [
                'id'    => 141,
                'title' => 'sendinblue_access',
            ],
            [
                'id'    => 142,
                'title' => 'google_create',
            ],
            [
                'id'    => 143,
                'title' => 'google_edit',
            ],
            [
                'id'    => 144,
                'title' => 'google_show',
            ],
            [
                'id'    => 145,
                'title' => 'google_delete',
            ],
            [
                'id'    => 146,
                'title' => 'google_access',
            ],
            [
                'id'    => 147,
                'title' => 'virtual_access',
            ],
            [
                'id'    => 148,
                'title' => 'online_class_create',
            ],
            [
                'id'    => 149,
                'title' => 'online_class_edit',
            ],
            [
                'id'    => 150,
                'title' => 'online_class_show',
            ],
            [
                'id'    => 151,
                'title' => 'online_class_delete',
            ],
            [
                'id'    => 152,
                'title' => 'online_class_access',
            ],
            [
                'id'    => 153,
                'title' => 'reservation_create',
            ],
            [
                'id'    => 154,
                'title' => 'reservation_edit',
            ],
            [
                'id'    => 155,
                'title' => 'reservation_show',
            ],
            [
                'id'    => 156,
                'title' => 'reservation_delete',
            ],
            [
                'id'    => 157,
                'title' => 'reservation_access',
            ],
            [
                'id'    => 158,
                'title' => 'contact_form_create',
            ],
            [
                'id'    => 159,
                'title' => 'contact_form_edit',
            ],
            [
                'id'    => 160,
                'title' => 'contact_form_show',
            ],
            [
                'id'    => 161,
                'title' => 'contact_form_delete',
            ],
            [
                'id'    => 162,
                'title' => 'contact_form_access',
            ],
            [
                'id'    => 163,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 164,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 165,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 166,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 167,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 168,
                'title' => 'payment_create',
            ],
            [
                'id'    => 169,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 170,
                'title' => 'payment_show',
            ],
            [
                'id'    => 171,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 172,
                'title' => 'payment_access',
            ],
            [
                'id'    => 173,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 174,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 175,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 176,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 177,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 178,
                'title' => 'blog_create',
            ],
            [
                'id'    => 179,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 180,
                'title' => 'blog_show',
            ],
            [
                'id'    => 181,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 182,
                'title' => 'blog_access',
            ],
            [
                'id'    => 183,
                'title' => 'enrollment_create',
            ],
            [
                'id'    => 184,
                'title' => 'enrollment_edit',
            ],
            [
                'id'    => 185,
                'title' => 'enrollment_show',
            ],
            [
                'id'    => 186,
                'title' => 'enrollment_delete',
            ],
            [
                'id'    => 187,
                'title' => 'enrollment_access',
            ],
            [
                'id'    => 188,
                'title' => 'page_create',
            ],
            [
                'id'    => 189,
                'title' => 'page_edit',
            ],
            [
                'id'    => 190,
                'title' => 'page_show',
            ],
            [
                'id'    => 191,
                'title' => 'page_delete',
            ],
            [
                'id'    => 192,
                'title' => 'page_access',
            ],
            [
                'id'    => 193,
                'title' => 'configuration_access',
            ],
            [
                'id'    => 194,
                'title' => 'slider_create',
            ],
            [
                'id'    => 195,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 196,
                'title' => 'slider_show',
            ],
            [
                'id'    => 197,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 198,
                'title' => 'slider_access',
            ],
            [
                'id'    => 199,
                'title' => 'api_access',
            ],
            [
                'id'    => 200,
                'title' => 'content_access',
            ],
            [
                'id'    => 201,
                'title' => 'static_page_access',
            ],
            [
                'id'    => 202,
                'title' => 'bullet_create',
            ],
            [
                'id'    => 203,
                'title' => 'bullet_edit',
            ],
            [
                'id'    => 204,
                'title' => 'bullet_show',
            ],
            [
                'id'    => 205,
                'title' => 'bullet_delete',
            ],
            [
                'id'    => 206,
                'title' => 'bullet_access',
            ],
            [
                'id'    => 207,
                'title' => 'index_about_create',
            ],
            [
                'id'    => 208,
                'title' => 'index_about_edit',
            ],
            [
                'id'    => 209,
                'title' => 'index_about_show',
            ],
            [
                'id'    => 210,
                'title' => 'index_about_delete',
            ],
            [
                'id'    => 211,
                'title' => 'index_about_access',
            ],
            [
                'id'    => 212,
                'title' => 'index_reason_create',
            ],
            [
                'id'    => 213,
                'title' => 'index_reason_edit',
            ],
            [
                'id'    => 214,
                'title' => 'index_reason_show',
            ],
            [
                'id'    => 215,
                'title' => 'index_reason_delete',
            ],
            [
                'id'    => 216,
                'title' => 'index_reason_access',
            ],
            [
                'id'    => 217,
                'title' => 'index_testimonial_create',
            ],
            [
                'id'    => 218,
                'title' => 'index_testimonial_edit',
            ],
            [
                'id'    => 219,
                'title' => 'index_testimonial_show',
            ],
            [
                'id'    => 220,
                'title' => 'index_testimonial_delete',
            ],
            [
                'id'    => 221,
                'title' => 'index_testimonial_access',
            ],
            [
                'id'    => 222,
                'title' => 'ctum_create',
            ],
            [
                'id'    => 223,
                'title' => 'ctum_edit',
            ],
            [
                'id'    => 224,
                'title' => 'ctum_show',
            ],
            [
                'id'    => 225,
                'title' => 'ctum_delete',
            ],
            [
                'id'    => 226,
                'title' => 'ctum_access',
            ],
            [
                'id'    => 227,
                'title' => 'about_content_access',
            ],
            [
                'id'    => 228,
                'title' => 'about_create',
            ],
            [
                'id'    => 229,
                'title' => 'about_edit',
            ],
            [
                'id'    => 230,
                'title' => 'about_show',
            ],
            [
                'id'    => 231,
                'title' => 'about_delete',
            ],
            [
                'id'    => 232,
                'title' => 'about_access',
            ],
            [
                'id'    => 233,
                'title' => 'selling_point_create',
            ],
            [
                'id'    => 234,
                'title' => 'selling_point_edit',
            ],
            [
                'id'    => 235,
                'title' => 'selling_point_show',
            ],
            [
                'id'    => 236,
                'title' => 'selling_point_delete',
            ],
            [
                'id'    => 237,
                'title' => 'selling_point_access',
            ],
            [
                'id'    => 238,
                'title' => 'company_create',
            ],
            [
                'id'    => 239,
                'title' => 'company_edit',
            ],
            [
                'id'    => 240,
                'title' => 'company_show',
            ],
            [
                'id'    => 241,
                'title' => 'company_delete',
            ],
            [
                'id'    => 242,
                'title' => 'company_access',
            ],
            [
                'id'    => 243,
                'title' => 'social_network_create',
            ],
            [
                'id'    => 244,
                'title' => 'social_network_edit',
            ],
            [
                'id'    => 245,
                'title' => 'social_network_show',
            ],
            [
                'id'    => 246,
                'title' => 'social_network_delete',
            ],
            [
                'id'    => 247,
                'title' => 'social_network_access',
            ],
            [
                'id'    => 248,
                'title' => 'featured_course_create',
            ],
            [
                'id'    => 249,
                'title' => 'featured_course_edit',
            ],
            [
                'id'    => 250,
                'title' => 'featured_course_show',
            ],
            [
                'id'    => 251,
                'title' => 'featured_course_delete',
            ],
            [
                'id'    => 252,
                'title' => 'featured_course_access',
            ],
            [
                'id'    => 253,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
