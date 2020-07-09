<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 1,
            'name' => 'Wallet',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 1,
            'name' => 'Safe box',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 2,
            'name' => 'Checking account',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 2,
            'name' => 'Savings account',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 2,
            'name' => 'Payroll account',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('account_types')->insert([
            'visibility_id' => 3,
            'account_category_id' => 2,
            'name' => 'Payment account',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
