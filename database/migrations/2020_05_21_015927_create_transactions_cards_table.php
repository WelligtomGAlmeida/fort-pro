<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('card_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_id')->nullable($value = false)->unique();
            $table->timestamps();

            $table->primary(['card_id', 'transaction_id']);
            $table->foreign('card_id')->references('id')->on('cards');
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
        Schema::dropIfExists('transactions_cards');
    }
}
