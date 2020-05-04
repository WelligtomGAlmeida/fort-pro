<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('income_expense_id')->nullable($value = true);
            $table->unsignedBigInteger('manual_transaction_id')->nullable($value = true);
            $table->unsignedBigInteger('transaction_movement_id')->nullable($value = false);
            $table->unsignedBigInteger('payment_status_id')->nullable($value = false);
            $table->decimal('value', 15, 2)->nullable($value = false);
            $table->decimal('additional_value', 15, 2)->nullable($value = true);
            $table->integer('installment_number')->nullable($value = false);
            $table->date('due_date', 5)->nullable($value = false);
            $table->date('effective_date', 5)->nullable($value = true);
            $table->string('description', 250)->nullable($value = true);
            $table->timestamps();

            $table->foreign('income_expense_id')->references('id')->on('incomes_expenses');
            $table->foreign('manual_transaction_id')->references('id')->on('manual_transactions');
            $table->foreign('transaction_movement_id')->references('id')->on('transaction_movements');
            $table->foreign('payment_status_id')->references('id')->on('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
