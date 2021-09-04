<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToForumLikesTable extends Migration
{
    public function up()
    {
        Schema::table('forum_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4794028')->references('id')->on('users');
        });
    }
}
