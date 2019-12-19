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
        $this->call(UsersTableSeeder::class);
        $this->call(ClaimsTableSeeder::class);
        $this->call(ContructsTableSeeder::class);
        $this->call(ConstructsTableSeeder::class);
        $this->call(ConsttypesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(DepositTableSeeder::class);
        $this->call(DepositDispTableSeeder::class);
        $this->call(ClaimdetailTableSeeder::class);
    }
}
