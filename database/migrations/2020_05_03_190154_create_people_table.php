<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable($value = false);
            $table->string('name', 120)->nullable($value = false);
            $table->date('birth_date')->nullable($value = false);
            $table->string('cpf', 11)->nullable($value = false)->unique();
            $table->string('cell_phone', 11)->nullable($value = false);
            $table->string('email', 100)->nullable($value = false)->unique();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
