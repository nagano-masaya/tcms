<?php

use Illuminate\Database\Seeder;

class OrderdetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orderdetail')->delete();
        
        \DB::table('orderdetail')->insert(array (
            0 => 
            array (
                'odrdetail_id' => 1,
                'item_name' => '4ｔユニック',
                'unit_price' => 60000000,
                'qty' => 300000,
                'unit_id' => 1,
                'total_price' => 1800000000,
                'tax' => 180000000,
                'taxed_price' => 1980000000,
                'order_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}