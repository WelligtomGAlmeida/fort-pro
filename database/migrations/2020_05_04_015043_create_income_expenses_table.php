<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('account_id')->nullable($value = false);
            $table->unsignedBigInteger('recurrence_id')->nullable($value = false);
            $table->unsignedBigInteger('payment_status_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_movement_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_participant_id')->nullable($value = true);
            $table->string('name', 100)->nullable($value = false);
            $table->string('description', 250)->nullable($value = true);
            $table->decimal('value', 15, 2)->nullable($value = false);
            $table->integer('installments')->nullable($value = false);
            $table->date('operation_date', 5)->nullable($value = false);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('recurrence_id')->references('id')->on('recurrences');
            $table->foreign('payment_status_id')->references('id')->on('payment_status');
            $table->foreign('transaction_movement_id')->references('id')->on('transaction_movements');
            $table->foreign('transaction_participant_id')->references('id')->on('transaction_participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes_expenses');
    }
}
