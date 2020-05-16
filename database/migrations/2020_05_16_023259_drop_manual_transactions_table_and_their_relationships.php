<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropManualTransactionsTableAndTheirRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() !== 'sqlite'){
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropForeign(['manual_transaction_id']);
                $table->dropColumn('manual_transaction_id');

                $table->unsignedBigInteger('income_expense_id')->nullable($value = false)->change();
            });

            Schema::drop('manual_transactions');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (DB::getDriverName() !== 'sqlite'){
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

            Schema::table('transactions', function (Blueprint $table) {
                $table->unsignedBigInteger('manual_transaction_id')->nullable($value = true);
                $table->foreign('manual_transaction_id')->references('id')->on('manual_transactions');

                $table->unsignedBigInteger('income_expense_id')->nullable($value = true)->change();
            });
        }
    }
}
