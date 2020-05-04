<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionCategoryRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_category_relationship', function (Blueprint $table) {
            $table->unsignedBigInteger('income_expense_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_category_id')->nullable($value = false);
            $table->timestamps();

            $table->primary([
                'income_expense_id',
                'transaction_category_id'
            ], 'PK_transaction_category_relationship');
            $table->foreign('income_expense_id', 'FK_transaction_category_relationship_income_expense')->references('id')->on('incomes_expenses');
            $table->foreign('transaction_category_id', 'FK_transaction_category_relationship_transaction_category')->references('id')->on('transaction_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_category_relationship');
    }
}
