<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropAccountIdColumnInIncomesExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() !== 'sqlite'){
            Schema::table('incomes_expenses', function (Blueprint $table) {
                $table->dropForeign(['account_id']);
                $table->dropColumn('account_id');
            });
        }
        else{
            Schema::table('incomes_expenses', function (Blueprint $table) {
                $table->unsignedBigInteger('account_id')->nullable($value = true)->change();
            });
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
            Schema::table('incomes_expenses', function (Blueprint $table) {
                $table->unsignedBigInteger('account_id')->nullable($value = false);
                $table->foreign('account_id')->references('id')->on('accounts');
            });
        }
        else{
            Schema::table('incomes_expenses', function (Blueprint $table) {
                $table->unsignedBigInteger('account_id')->nullable($value = false)->change();
            });
        }
    }
}
