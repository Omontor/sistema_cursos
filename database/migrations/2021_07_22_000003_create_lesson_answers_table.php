<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('lesson_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
