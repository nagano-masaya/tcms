<?php

use Illuminate\Database\Seeder;

class ClaimdetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('claimdetail')->delete();
        
        \DB::table('claimdetail')->insert(array (
            0 => 
            array (
                'clmdetail_id' => 1,
                'listorder' => 0,
                'claim_id' => 1,
                'cont_id' => 1,
                'cont_text' => '工事１',
                'title' => '',
                'unit_price' => 20000000000,
                'qty' => 10000,
                'total_price' => 20000000000,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-01-28 01:35:14',
            ),
            1 => 
            array (
                'clmdetail_id' => 2,
                'listorder' => 0,
                'claim_id' => 1,
                'cont_id' => 1,
                'cont_text' => '工事１',
                'title' => '工事１－撤去',
                'unit_price' => 5000000000,
                'qty' => 10000,
                'total_price' => 5000000000,
                'deleted_at' => '2020-01-28 01:35:14',
                'created_at' => NULL,
                'updated_at' => '2020-01-28 01:35:14',
            ),
        ));
        
        
    }
}