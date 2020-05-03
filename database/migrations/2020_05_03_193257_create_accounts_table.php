<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('account_category_id')->nullable($value = false);
            $table->unsignedBigInteger('bank_id')->nullable($value = true);
            $table->unsignedBigInteger('account_type_id')->nullable($value = true);
            $table->string('name', 100)->nullable($value = false);
            $table->string('agency', 10)->nullable($value = true);
            $table->string('number', 12)->nullable($value = true);
            $table->string('check_digit', 5)->nullable($value = true);
            $table->timestamps();

            $table->unique([
                'bank_id',
                'account_type_id',
                'agency',
                'number',
                'check_digit'
            ], 'accounts_account_unique');
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('account_category_id')->references('id')->on('account_categories');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('account_type_id')->references('id')->on('account_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
