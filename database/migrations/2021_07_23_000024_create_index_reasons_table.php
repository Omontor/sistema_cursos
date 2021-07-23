<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexReasonsTable extends Migration
{
    public function up()
    {
        Schema::create('index_reasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content');
            $table->string('icon');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
