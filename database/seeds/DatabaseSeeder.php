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
        $this->call(OrderdetailTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(UnittypesTableSeeder::class);
        $this->call(OrderclaimsTableSeeder::class);
        $this->call(OrdertypeTableSeeder::class);
        $this->call(PersonTableSeeder::class);
    }
}
