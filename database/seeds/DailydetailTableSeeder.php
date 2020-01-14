<?php

use Illuminate\Database\Seeder;

class DailydetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dailydetail')->delete();
        
        \DB::table('dailydetail')->insert(array (
            0 => 
            array (
                'daily_id' => 1,
                'const_id' => 1,
                'daily_date' => '2020-01-01',
                'disp_order' => 0,
                'subject_id' => 1,
                'subject' => '労務費',
                'item_name' => '4tダンプ',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 1,
                'unit_id' => 1,
                'unit_text' => '台',
                'supplier_id' => 0,
                'supplier_text' => '川端',
                'unit_price' => 250000000,
                'sub_total' => 250000000,
                'tax' => 25000000,
                'total_price' => 275000000,
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}