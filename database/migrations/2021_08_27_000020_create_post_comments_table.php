<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('comment');
            $table->integer('status');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
