<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisibilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visibilities')->insert([
            'name' => 'Invisible to everyone',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('visibilities')->insert([
            'name' => 'Visible to the user who created it',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('visibilities')->insert([
            'name' => 'Visible to everyone',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
