<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_balances', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id')->nullable($value = false);
            $table->unsignedBigInteger('save_point_id')->nullable($value = false);
            $table->decimal('value', 15, 2)->nullable($value = false);
            $table->timestamps();

            $table->primary([
                'account_id',
                'save_point_id'
            ]);
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('save_point_id')->references('id')->on('saving_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_balances');
    }
}
