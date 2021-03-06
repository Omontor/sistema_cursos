<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCertificatesTable extends Migration
{
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4426743')->references('id')->on('users');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_4426744')->references('id')->on('courses');
        });
    }
}
