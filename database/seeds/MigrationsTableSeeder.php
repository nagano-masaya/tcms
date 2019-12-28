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
                'id' => 59,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 60,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 61,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 62,
                'migration' => '2019_11_28_013128_create_contructs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 63,
                'migration' => '2019_12_02_021009_create_constructs_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 64,
                'migration' => '2019_12_02_021228_create_claims_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 65,
                'migration' => '2019_12_02_021251_create_comments_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 66,
                'migration' => '2019_12_02_021312_create_orders_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 67,
                'migration' => '2019_12_11_081827_create_consttypes_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 68,
                'migration' => '2019_12_12_043548_create_company_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 69,
                'migration' => '2019_12_14_054243_create_deposit_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 70,
                'migration' => '2019_12_14_054349_create_deposit_disp_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 71,
                'migration' => '2019_12_19_060215_create_claimdetail_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 72,
                'migration' => '2019_12_22_125715_create_orderdetail_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 73,
                'migration' => '2019_12_24_020135_crate_units_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 74,
                'migration' => '2019_12_24_020834_crate_payments_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 75,
                'migration' => '2019_12_24_025233_create_unittypes_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 76,
                'migration' => '2019_12_26_142512_create_ordertype_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 77,
                'migration' => '2019_12_27_055837_create_orderclaims_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}