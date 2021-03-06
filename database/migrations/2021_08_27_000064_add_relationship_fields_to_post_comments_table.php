<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('post_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4738076')->references('id')->on('users');
        });
    }
}
