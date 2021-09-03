<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIndexTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::table('index_testimonials', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4444649')->references('id')->on('users');
        });
    }
}
