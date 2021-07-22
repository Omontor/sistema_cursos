<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripesTable extends Migration
{
    public function up()
    {
        Schema::create('stripes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('api')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
