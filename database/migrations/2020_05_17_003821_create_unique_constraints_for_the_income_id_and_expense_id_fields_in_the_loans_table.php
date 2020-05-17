<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueConstraintsForTheIncomeIdAndExpenseIdFieldsInTheLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->unsignedBigInteger('income_id')->nullable($value = false)->unique()->change();
            $table->unsignedBigInteger('expense_id')->nullable($value = false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->index('income_id', 'loans_income_id_foreign');
            $table->index('expense_id', 'loans_expense_id_foreign');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropUnique(['income_id']);
            $table->dropUnique(['expense_id']);
        });
    }
}
