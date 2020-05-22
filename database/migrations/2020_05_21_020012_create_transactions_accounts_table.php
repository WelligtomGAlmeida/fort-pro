<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_id')->nullable($value = false)->unique();
            $table->timestamps();

            $table->primary(['account_id', 'transaction_id']);
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_accounts');
    }
}
