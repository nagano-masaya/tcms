<?php

use Illuminate\Database\Seeder;

class OrderclaimsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orderclaims')->delete();
        
        \DB::table('orderclaims')->insert(array (
            0 => 
            array (
                'orderclaim_id' => 1,
                'order_id' => 1,
                'orderclaim_recept_date' => '2019-12-28 11:10:34',
                'orderclaim_recept_user_id' => 1,
                'orderclaim_recept_user_name' => '社員Q',
                'oderclaim_discount_price' => 0,
                'orderclaim_offset_price' => 0,
                'orderclaim_claim_price' => 0,
                'claim_files' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}