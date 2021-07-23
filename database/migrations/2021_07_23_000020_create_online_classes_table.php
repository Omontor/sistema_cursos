<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineClassesTable extends Migration
{
    public function up()
    {
        Schema::create('online_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_reunion')->nullable();
            $table->string('title');
            $table->longText('excerpt');
            $table->longText('content');
            $table->integer('duration');
            $table->string('classroom')->nullable();
            $table->string('password');
            $table->integer('max_student');
            $table->datetime('start');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
