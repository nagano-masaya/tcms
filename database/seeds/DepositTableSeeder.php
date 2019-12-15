<?php

use Illuminate\Database\Seeder;

class DepositTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('deposit')->delete();
        
        \DB::table('deposit')->insert(array (
            0 => 
            array (
                'depo_id' => 1,
                'company_id' => 1,
                'depo_date' => '2019-12-14 16:37:30',
                'price' => 200000000,
                'user_id' => 1,
                'history' => '[]',
                'deleted_at' => NULL,
                'created_at' => '2019-12-14 16:37:30',
                'updated_at' => '2019-12-14 16:37:30',
            ),
        ));
        
        
    }
}