<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecurrencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recurrences')->insert([
            'name' => 'Sporadic',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('recurrences')->insert([
            'name' => 'Parceled out',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('recurrences')->insert([
            'name' => 'Recurrent',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
