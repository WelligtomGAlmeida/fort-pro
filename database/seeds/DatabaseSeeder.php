<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PeopleSeeder::class);
        $this->call(VisibilitiesSeeder::class);
        $this->call(AccountCategoriesSeeder::class);
        $this->call(AccountTypesSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(CardTypesSeeder::class);
        $this->call(RecurrencesSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(TransactionMovementsSeeder::class);
        $this->call(TransactionCategoriesSeeder::class);
        $this->call(PersonTypesSeeder::class);
        $this->call(LoanMovementsSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
    }
}
