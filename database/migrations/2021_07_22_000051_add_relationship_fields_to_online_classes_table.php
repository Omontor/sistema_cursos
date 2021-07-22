<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOnlineClassesTable extends Migration
{
    public function up()
    {
        Schema::table('online_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_4427296')->references('id')->on('courses');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4427309')->references('id')->on('users');
        });
    }
}
