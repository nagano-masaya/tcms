<?php

use Illuminate\Database\Seeder;

class UnittypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unittypes')->delete();
        
        \DB::table('unittypes')->insert(array (
            0 => 
            array (
                'unittype_id' => 1,
                'unittype_title' => '数量',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'unittype_id' => 2,
                'unittype_title' => '重さ',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'unittype_id' => 3,
                'unittype_title' => '長さ',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'unittype_id' => 4,
                'unittype_title' => '容積',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'unittype_id' => 5,
                'unittype_title' => '広さ',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'unittype_id' => 6,
                'unittype_title' => '電気',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'unittype_id' => 7,
                'unittype_title' => '時間',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}