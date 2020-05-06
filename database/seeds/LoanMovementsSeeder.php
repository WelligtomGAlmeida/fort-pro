<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanMovementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_movements')->insert([
            'name' => 'Loan granted',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('loan_movements')->insert([
            'name' => 'Loan received',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
