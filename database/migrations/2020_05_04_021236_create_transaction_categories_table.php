<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('transaction_movement_id')->nullable($value = false);
            $table->unsignedBigInteger('visibility_id')->nullable($value = false);
            $table->string('name', 100)->nullable($value = false);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('transaction_movement_id')->references('id')->on('transaction_movements');
            $table->foreign('visibility_id')->references('id')->on('visibilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_categories');
    }
}
