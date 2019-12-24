<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_11_28_013128_create_contructs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_12_02_021009_create_constructs_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 7,
                'migration' => '2019_12_02_021251_create_comments_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 8,
                'migration' => '2019_12_02_021312_create_orders_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 9,
                'migration' => '2019_12_11_081827_create_consttypes_table',
                'batch' => 2,
            ),
            8 => 
            array (
                'id' => 10,
                'migration' => '2019_12_12_043548_create_company_table',
                'batch' => 3,
            ),
            9 => 
            array (
                'id' => 11,
                'migration' => '2019_12_02_021228_create_claims_table',
                'batch' => 4,
            ),
            10 => 
            array (
                'id' => 17,
                'migration' => '2019_12_14_054243_create_deposit_table',
                'batch' => 5,
            ),
            11 => 
            array (
                'id' => 18,
                'migration' => '2019_12_14_054349_create_deposit_disp_table',
                'batch' => 5,
            ),
            12 => 
            array (
                'id' => 20,
                'migration' => '2019_12_19_060215_create_claimdetail_table',
                'batch' => 6,
            ),
            13 => 
            array (
                'id' => 21,
                'migration' => '2019_12_22_125715_create_orderdetail_table',
                'batch' => 7,
            ),
            14 => 
            array (
                'id' => 22,
                'migration' => '2019_12_24_020135_crate_units_table',
                'batch' => 8,
            ),
            15 => 
            array (
                'id' => 23,
                'migration' => '2019_12_24_020834_crate_payments_table',
                'batch' => 8,
            ),
            16 => 
            array (
                'id' => 24,
                'migration' => '2019_12_24_025233_create_unittypes_table',
                'batch' => 9,
            ),
        ));
        
        
    }
}