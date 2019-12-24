<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'unit_id' => 1,
                'unit_title' => '個',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'unit_id' => 2,
                'unit_title' => '台',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'unit_id' => 3,
                'unit_title' => 'ケース',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'unit_id' => 4,
                'unit_title' => 'ダース',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'unit_id' => 5,
                'unit_title' => '年',
                'unit_type' => 7,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'unit_id' => 6,
                'unit_title' => 'ヵ月',
                'unit_type' => 7,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'unit_id' => 7,
                'unit_title' => '日',
                'unit_type' => 7,
                'font_size' => '0.7',
                'user_id' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'unit_id' => 8,
                'unit_title' => '時間',
                'unit_type' => 7,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'unit_id' => 9,
                'unit_title' => '分',
                'unit_type' => 7,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'unit_id' => 10,
                'unit_title' => '㌧',
                'unit_type' => 2,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'unit_id' => 11,
                'unit_title' => 'kg',
                'unit_type' => 2,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'unit_id' => 12,
                'unit_title' => 'g',
                'unit_type' => 2,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'unit_id' => 13,
                'unit_title' => 'mg',
                'unit_type' => 2,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'unit_id' => 14,
                'unit_title' => '巻',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'unit_id' => 15,
                'unit_title' => '本',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:13:39',
                'updated_at' => '2019-12-24 12:13:39',
            ),
            15 => 
            array (
                'unit_id' => 16,
                'unit_title' => '箱',
                'unit_type' => 1,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:16:54',
                'updated_at' => '2019-12-24 12:16:54',
            ),
            16 => 
            array (
                'unit_id' => 17,
                'unit_title' => 'km',
                'unit_type' => 3,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:17:49',
                'updated_at' => '2019-12-24 12:17:49',
            ),
            17 => 
            array (
                'unit_id' => 18,
                'unit_title' => 'm',
                'unit_type' => 3,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:18:07',
                'updated_at' => '2019-12-24 12:18:07',
            ),
            18 => 
            array (
                'unit_id' => 19,
                'unit_title' => 'cm',
                'unit_type' => 3,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:18:16',
                'updated_at' => '2019-12-24 12:18:16',
            ),
            19 => 
            array (
                'unit_id' => 20,
                'unit_title' => 'cm',
                'unit_type' => 3,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:18:27',
                'updated_at' => '2019-12-24 12:18:27',
            ),
            20 => 
            array (
                'unit_id' => 21,
                'unit_title' => 'mm',
                'unit_type' => 3,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:18:36',
                'updated_at' => '2019-12-24 12:18:36',
            ),
            21 => 
            array (
                'unit_id' => 22,
                'unit_title' => 'ℓ',
                'unit_type' => 4,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:21:47',
                'updated_at' => '2019-12-24 12:21:47',
            ),
            22 => 
            array (
                'unit_id' => 23,
                'unit_title' => '㎥',
                'unit_type' => 4,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:22:05',
                'updated_at' => '2019-12-24 12:22:05',
            ),
            23 => 
            array (
                'unit_id' => 24,
                'unit_title' => '㎤',
                'unit_type' => 4,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:22:26',
                'updated_at' => '2019-12-24 12:22:26',
            ),
            24 => 
            array (
                'unit_id' => 25,
                'unit_title' => '㎢',
                'unit_type' => 5,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:23:20',
                'updated_at' => '2019-12-24 12:23:20',
            ),
            25 => 
            array (
                'unit_id' => 26,
                'unit_title' => 'ha',
                'unit_type' => 5,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:24:15',
                'updated_at' => '2019-12-24 12:24:15',
            ),
            26 => 
            array (
                'unit_id' => 27,
                'unit_title' => '㌃',
                'unit_type' => 5,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:24:31',
                'updated_at' => '2019-12-24 12:24:31',
            ),
            27 => 
            array (
                'unit_id' => 28,
                'unit_title' => '㎡',
                'unit_type' => 5,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:24:49',
                'updated_at' => '2019-12-24 12:24:49',
            ),
            28 => 
            array (
                'unit_id' => 29,
                'unit_title' => '㎠',
                'unit_type' => 5,
                'font_size' => '0.7',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 12:25:06',
                'updated_at' => '2019-12-24 12:25:06',
            ),
        ));
        
        
    }
}