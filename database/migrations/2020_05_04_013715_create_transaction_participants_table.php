<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable($value = false);
            $table->unsignedBigInteger('person_type_id')->nullable($value = false);
            $table->string('name', 100)->nullable($value = false);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('person_type_id')->references('id')->on('person_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_participants');
    }
}
