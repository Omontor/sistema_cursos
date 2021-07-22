<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('lesson_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_fk_4426131')->references('id')->on('lesson_questions');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4426132')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4426137')->references('id')->on('users');
        });
    }
}
