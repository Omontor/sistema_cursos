<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->boolean('coupon_use')->default(0)->nullable();
            $table->string('transaction_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
