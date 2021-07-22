<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRequirmentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_requirment', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_4425937')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('requirment_id');
            $table->foreign('requirment_id', 'requirment_id_fk_4425937')->references('id')->on('requirments')->onDelete('cascade');
        });
    }
}
