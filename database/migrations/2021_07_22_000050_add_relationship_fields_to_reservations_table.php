<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4427319')->references('id')->on('users');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_4427320')->references('id')->on('courses');
        });
    }
}
