<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFeaturedCoursePivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_featured_course', function (Blueprint $table) {
            $table->unsignedBigInteger('featured_course_id');
            $table->foreign('featured_course_id', 'featured_course_id_fk_4445021')->references('id')->on('featured_courses')->onDelete('cascade');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_4445021')->references('id')->on('courses')->onDelete('cascade');
        });
    }
}
