<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToForumCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('forum_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('thread_id');
            $table->foreign('thread_id', 'thread_fk_4738047')->references('id')->on('forum_threads');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4738048')->references('id')->on('users');
        });
    }
}
