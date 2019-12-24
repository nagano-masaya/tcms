<?php

use Illuminate\Database\Seeder;

class DepositDispTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('deposit_disp')->delete();
        
        \DB::table('deposit_disp')->insert(array (
            0 => 
            array (
                'clmdetail_id' => 1,
                'depo_id' => 1,
                'apply_date' => '2019-12-21 11:53:37',
                'apply_price' => 100000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'clmdetail_id' => 1,
                'depo_id' => 2,
                'apply_date' => '2019-12-21 11:54:29',
                'apply_price' => 2000000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}