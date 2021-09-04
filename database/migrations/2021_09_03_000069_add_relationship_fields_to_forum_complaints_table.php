<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToForumComplaintsTable extends Migration
{
    public function up()
    {
        Schema::table('forum_complaints', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4794041')->references('id')->on('users');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id', 'type_fk_4794054')->references('id')->on('complaint_types');
        });
    }
}
