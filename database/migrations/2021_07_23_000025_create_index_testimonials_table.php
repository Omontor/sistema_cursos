<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('index_testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
