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
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 1,
                'qty' => 10000,
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
                'updated_at' => '2020-01-22 04:42:46',
            ),
            1 => 
            array (
                'daily_id' => 2,
                'const_id' => 1,
                'daily_date' => '2020-01-17',
                'disp_order' => 1,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => 'ガソリン',
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 1,
                'qty' => 1800000,
                'unit_id' => 22,
                'unit_text' => 'ℓ',
                'supplier_id' => 14,
                'supplier_text' => '三和商事',
                'unit_price' => 1480000,
                'sub_total' => 118400000,
                'tax' => 11840000,
                'total_price' => 130240000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 11:58:07',
                'updated_at' => '2020-01-22 04:42:46',
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
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => NULL,
                'item_id' => NULL,
                'qty' => 10000,
                'unit_id' => 2,
                'unit_text' => '台',
                'supplier_id' => 10,
                'supplier_text' => 'ふそうリース',
                'unit_price' => 600000000,
                'sub_total' => 600000000,
                'tax' => 60000000,
                'total_price' => 660000000,
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
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 1,
                'qty' => 10000,
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
                'updated_at' => '2020-01-22 07:00:43',
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
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => NULL,
                'item_id' => 1,
                'qty' => 800000,
                'unit_id' => 22,
                'unit_text' => 'ℓ',
                'supplier_id' => 14,
                'supplier_text' => '三和商事',
                'unit_price' => 1480000,
                'sub_total' => 118400000,
                'tax' => 11840000,
                'total_price' => 130240000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 08:18:33',
                'updated_at' => '2020-01-22 07:00:43',
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
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 1,
                'qty' => 1000000,
                'unit_id' => 1,
                'unit_text' => '個',
                'supplier_id' => 7,
                'supplier_text' => '大分建材',
                'unit_price' => 2400000,
                'sub_total' => 240000000,
                'tax' => 24000000,
                'total_price' => 264000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 08:25:52',
                'updated_at' => '2020-01-22 06:57:48',
            ),
            6 => 
            array (
                'daily_id' => 7,
                'const_id' => 1,
                'daily_date' => '2020-01-18',
                'disp_order' => 0,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => '４tユニック ',
                'paymethod_id' => 1003,
                'paymethod_text' => 'リース',
                'person_id' => 0,
                'item_id' => 16,
                'qty' => 10000,
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
                'created_at' => '2020-01-18 08:49:25',
                'updated_at' => '2020-01-27 09:41:44',
            ),
            7 => 
            array (
                'daily_id' => 8,
                'const_id' => 1,
                'daily_date' => '2020-01-18',
                'disp_order' => 1,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => '10cmブロック ',
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 1,
                'qty' => 12000000,
                'unit_id' => 1,
                'unit_text' => '個',
                'supplier_id' => 20,
                'supplier_text' => '三浦建材',
                'unit_price' => 1480000,
                'sub_total' => 1776000000,
                'tax' => 177600000,
                'total_price' => 1953600000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-18 08:49:25',
                'updated_at' => '2020-01-27 09:41:38',
            ),
            8 => 
            array (
                'daily_id' => 9,
                'const_id' => 1,
                'daily_date' => '2020-01-18',
                'disp_order' => 2,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => '１t土嚢袋 ',
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 0,
                'item_id' => 6,
                'qty' => 5000000,
                'unit_id' => 1,
                'unit_text' => '個',
                'supplier_id' => 7,
                'supplier_text' => '大分建材',
                'unit_price' => 2400000,
                'sub_total' => 240000000,
                'tax' => 24000000,
                'total_price' => 264000000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-18 08:49:25',
                'updated_at' => '2020-01-27 09:41:38',
            ),
            9 => 
            array (
                'daily_id' => 24,
                'const_id' => 1,
                'daily_date' => '2020-01-21',
                'disp_order' => 0,
                'subject_id' => 100,
                'subject' => '材料費',
                'item_name' => 'BH0.45',
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => NULL,
                'item_id' => 26,
                'qty' => 10000,
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
                'created_at' => '2020-01-21 08:01:03',
                'updated_at' => '2020-01-21 08:48:33',
            ),
            10 => 
            array (
                'daily_id' => 25,
                'const_id' => 1,
                'daily_date' => '2020-01-21',
                'disp_order' => 1,
                'subject_id' => 200,
                'subject' => '労務費',
                'item_name' => '小倉 ',
                'paymethod_id' => 1001,
                'paymethod_text' => '現金',
                'person_id' => 7,
                'item_id' => 0,
                'qty' => 80000,
                'unit_id' => 8,
                'unit_text' => '時間',
                'supplier_id' => 34,
                'supplier_text' => '辻田建機',
                'unit_price' => 16000000,
                'sub_total' => 128000000,
                'tax' => 12800000,
                'total_price' => 140800000,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-01-21 08:53:33',
                'updated_at' => '2020-01-21 08:53:33',
            ),
        ));
        
        
    }
}