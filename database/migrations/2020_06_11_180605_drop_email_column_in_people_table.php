<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropEmailColumnInPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() !== 'sqlite'){
            Schema::table('people', function (Blueprint $table) {
                $table->dropUnique(['email']);
                $table->dropColumn('email');
            });
        }
        else{
            Schema::table('people', function (Blueprint $table) {
                $table->unsignedBigInteger('email')->nullable($value = true)->change();
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
            Schema::table('people', function (Blueprint $table) {
                $table->string('email', 100)->nullable($value = false)->unique();
            });
        }
        else{
            Schema::table('people', function (Blueprint $table) {
                $table->unsignedBigInteger('email')->nullable($value = false)->change();
            });
        }
    }
}
