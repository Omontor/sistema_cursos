<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendinbluesTable extends Migration
{
    public function up()
    {
        Schema::create('sendinblues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('host');
            $table->string('user');
            $table->string('api')->nullable();
            $table->string('password');
            $table->string('security');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
