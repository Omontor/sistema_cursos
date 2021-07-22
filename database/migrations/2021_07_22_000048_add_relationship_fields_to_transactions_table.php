<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4427346')->references('id')->on('users');
            $table->unsignedBigInteger('payment_type_id');
            $table->foreign('payment_type_id', 'payment_type_fk_4427359')->references('id')->on('payments');
        });
    }
}
