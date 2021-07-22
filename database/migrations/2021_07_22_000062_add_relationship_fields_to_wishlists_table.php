<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWishlistsTable extends Migration
{
    public function up()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4426721')->references('id')->on('users');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_4426722')->references('id')->on('courses');
        });
    }
}
