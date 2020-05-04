<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('account_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_movement_id')->nullable($value = false);
            $table->string('name', 100)->nullable($value = false);
            $table->string('description', 250)->nullable($value = true);
            $table->decimal('value', 15, 2)->nullable($value = false);
            $table->date('operation_date')->nullable($value = false);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('transaction_movement_id')->references('id')->on('transaction_movements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_transactions');
    }
}
