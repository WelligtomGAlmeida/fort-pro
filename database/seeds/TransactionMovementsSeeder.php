<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionMovementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_movements')->insert([
            'name' => 'Cash inflow',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_movements')->insert([
            'name' => 'Cash outflow',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
