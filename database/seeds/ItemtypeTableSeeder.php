<?php

use Illuminate\Database\Seeder;

class ItemtypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('itemtype')->delete();
        
        \DB::table('itemtype')->insert(array (
            0 => 
            array (
                'item_type_id' => 1,
                'typename' => '資材',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'item_type_id' => 2,
                'typename' => '燃料',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'item_type_id' => 3,
                'typename' => 'レンタル',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'item_type_id' => 4,
                'typename' => '工具',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}