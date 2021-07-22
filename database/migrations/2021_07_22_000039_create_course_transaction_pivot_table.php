<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTransactionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'transaction_id_fk_4427345')->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_4427345')->references('id')->on('courses')->onDelete('cascade');
        });
    }
}
