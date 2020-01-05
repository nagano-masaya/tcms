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
        

        \DB::table('Migrations')->delete();
        
        \DB::table('Migrations')->insert(array (
            0 => 
            array (
                'id' => 313,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 314,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 315,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 316,
                'migration' => '2019_11_28_013128_create_contructs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 317,
                'migration' => '2019_12_02_021009_create_constructs_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 318,
                'migration' => '2019_12_02_021228_create_claims_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 319,
                'migration' => '2019_12_02_021251_create_comments_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 320,
                'migration' => '2019_12_02_021312_create_orders_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 321,
                'migration' => '2019_12_11_081827_create_consttypes_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 322,
                'migration' => '2019_12_12_043548_create_company_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 323,
                'migration' => '2019_12_14_054243_create_deposit_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 324,
                'migration' => '2019_12_14_054349_create_deposit_disp_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 325,
                'migration' => '2019_12_19_060215_create_claimdetail_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 326,
                'migration' => '2019_12_22_125715_create_orderdetail_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 327,
                'migration' => '2019_12_24_020135_crate_units_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 328,
                'migration' => '2019_12_24_020834_crate_payments_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 329,
                'migration' => '2019_12_24_025233_create_unittypes_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 330,
                'migration' => '2019_12_26_142512_create_ordertype_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 331,
                'migration' => '2019_12_27_055837_create_orderclaims_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 332,
                'migration' => '2019_12_29_083520_create_person_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}