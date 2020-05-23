<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Water Distribution and Treatment',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Electric power distribution',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Internet distribution',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Telephony services',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Food',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Restaurant',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Rental',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Transport',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Car Maintenance',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Domestic expenses',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Purchase of home appliances',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Buying Clothes',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Purchase of miscellaneous objects',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Medical expenses',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Travels',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Loan granted',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 3,
            'name' => 'Loan payment received previously',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 3,
            'name' => 'Loan received',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 3,
            'name' => 'Receipt of previously granted loan',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 3,
            'name' => 'Salary',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 3,
            'name' => 'Salary advance',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 3,
            'name' => 'Sale',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 1,
            'name' => 'Manual Transaction - Income',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 1,
            'name' => 'Manual Transaction - Expense',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 1,
            'visibility_id' => 1,
            'name' => 'Transfer - Income',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('transaction_categories')->insert([
            'person_id' => 1,
            'transaction_movement_id' => 2,
            'visibility_id' => 1,
            'name' => 'Transfer - Expense',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

    }
}
