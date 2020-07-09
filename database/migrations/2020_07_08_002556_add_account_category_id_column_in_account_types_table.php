<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountCategoryIdColumnInAccountTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_types', function (Blueprint $table) {
            $table->unsignedBigInteger('account_category_id')->nullable($value = false);

            $table->foreign('account_category_id')->references('id')->on('account_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_types', function (Blueprint $table) {
            $table->dropForeign(['account_category_id']);
            $table->dropColumn('account_category_id');
        });
    }
}
