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
                'daily_date' => '2020-01-17',
                'disp_order' => 0,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => 'BH0.45',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 1,
                'unit_id' => 2,
                'unit_text' => '台',
                'supplier_id' => 10,
                'supplier_text' => 'ふそうリース',
                'unit_price' => 250000000,
                'sub_total' => 250000000,
                'tax' => 25000000,
                'total_price' => 275000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-01-17 08:25:52',
            ),
            1 => 
            array (
                'daily_id' => 2,
                'const_id' => 1,
                'daily_date' => '2020-01-17',
                'disp_order' => 1,
                'subject_id' => 200,
                'subject' => '労務費',
                'item_name' => 'ガソリン',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 80,
                'unit_id' => 22,
                'unit_text' => 'ℓ',
                'supplier_id' => 14,
                'supplier_text' => '三和商事',
                'unit_price' => 148,
                'sub_total' => 11840,
                'tax' => 1184,
                'total_price' => 13024,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 11:58:07',
                'updated_at' => '2020-01-17 08:25:52',
            ),
            2 => 
            array (
                'daily_id' => 3,
                'const_id' => 2,
                'daily_date' => '2020-01-01',
                'disp_order' => 0,
                'subject_id' => 401,
                'subject' => '機械（リース',
                'item_name' => '25tラフタークレーン',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 1,
                'unit_id' => 2,
                'unit_text' => '台',
                'supplier_id' => 10,
                'supplier_text' => 'ふそうリース',
                'unit_price' => 60000,
                'sub_total' => 60000,
                'tax' => 6000,
                'total_price' => 66000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 11:59:35',
                'updated_at' => '2020-01-16 11:59:35',
            ),
            3 => 
            array (
                'daily_id' => 4,
                'const_id' => 1,
                'daily_date' => '2020-01-15',
                'disp_order' => 0,
                'subject_id' => 401,
                'subject' => '機械（リース',
                'item_name' => 'BH0.45',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 1,
                'unit_id' => 2,
                'unit_text' => '台',
                'supplier_id' => 10,
                'supplier_text' => 'ふそうリース',
                'unit_price' => 250000000,
                'sub_total' => 250000000,
                'tax' => 25000000,
                'total_price' => 275000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 08:18:33',
                'updated_at' => '2020-01-17 08:19:15',
            ),
            4 => 
            array (
                'daily_id' => 5,
                'const_id' => 1,
                'daily_date' => '2020-01-15',
                'disp_order' => 1,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => 'ガソリン',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 80,
                'unit_id' => 22,
                'unit_text' => 'ℓ',
                'supplier_id' => 14,
                'supplier_text' => '三和商事',
                'unit_price' => 148,
                'sub_total' => 11840,
                'tax' => 1184,
                'total_price' => 13024,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 08:18:33',
                'updated_at' => '2020-01-17 08:19:09',
            ),
            5 => 
            array (
                'daily_id' => 6,
                'const_id' => 1,
                'daily_date' => '2020-01-17',
                'disp_order' => 2,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => '10cmブロック',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 100,
                'unit_id' => 1,
                'unit_text' => '個',
                'supplier_id' => 7,
                'supplier_text' => '大分建材',
                'unit_price' => 240,
                'sub_total' => 24000,
                'tax' => 2400,
                'total_price' => 26400,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 08:25:52',
                'updated_at' => '2020-01-17 08:25:52',
            ),
        ));
        
        
    }
}