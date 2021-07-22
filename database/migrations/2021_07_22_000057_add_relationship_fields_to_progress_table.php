<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgressTable extends Migration
{
    public function up()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4426735')->references('id')->on('users');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id', 'lesson_fk_4426736')->references('id')->on('lessons');
        });
    }
}
