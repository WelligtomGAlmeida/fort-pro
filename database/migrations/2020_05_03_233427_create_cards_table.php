<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_type_id')->nullable($value = false);
            $table->unsignedBigInteger('account_id')->nullable($value = false);
            $table->unsignedBigInteger('bank_id')->nullable($value = false);
            $table->string('name', 100)->nullable($value = false);
            $table->date('invoice_due_date', 10)->nullable($value = true);
            $table->date('invoice_closing_date', 10)->nullable($value = true);
            $table->string('number', 16)->nullable($value = true);
            $table->timestamps();

            $table->foreign('card_type_id')->references('id')->on('card_types');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
