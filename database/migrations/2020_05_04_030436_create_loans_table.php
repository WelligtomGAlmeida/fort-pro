<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('loan_movement_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_participant_id')->nullable($value = false);
            $table->unsignedBigInteger('credit_account_id')->nullable($value = false);
            $table->unsignedBigInteger('debit_account_id')->nullable($value = false);
            $table->unsignedBigInteger('income_id')->nullable($value = false);
            $table->unsignedBigInteger('expense_id')->nullable($value = false);
            $table->string('name', 100)->nullable($value = false);
            $table->string('description', 250)->nullable($value = true);
            $table->decimal('credit_value', 15, 2)->nullable($value = false);
            $table->decimal('debit_value', 15, 2)->nullable($value = false);
            $table->integer('credit_installment')->nullable($value = false);
            $table->integer('debit_installment')->nullable($value = false);
            $table->date('credit_date')->nullable($value = false);
            $table->date('debit_date')->nullable($value = false);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('loan_movement_id')->references('id')->on('loan_movements');
            $table->foreign('transaction_participant_id')->references('id')->on('transaction_participants');
            $table->foreign('credit_account_id')->references('id')->on('accounts');
            $table->foreign('debit_account_id')->references('id')->on('accounts');
            $table->foreign('income_id')->references('id')->on('incomes_expenses');
            $table->foreign('expense_id')->references('id')->on('incomes_expenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
