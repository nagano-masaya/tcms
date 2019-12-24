<?php

use Illuminate\Database\Seeder;

class ConstructsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('constructs')->delete();
        
        \DB::table('constructs')->insert(array (
            0 => 
            array (
                'const_id' => 1,
                'cont_id' => 1,
                'user_id' => 1,
                'const_type' => 0,
                'title' => '工事１－１',
                'date_from' => '2019-11-28',
                'date_to' => '2019-12-28',
                'state' => 0,
                'progress' => 90.0,
                'resource_cost' => 780000,
                'person_cost' => 1800000,
                'histry' => '[]',
                'deleted_at' => NULL,
                'created_at' => '2019-12-01 00:00:00',
                'updated_at' => '2019-12-05 06:40:16',
            ),
            1 => 
            array (
                'const_id' => 2,
                'cont_id' => 1,
                'user_id' => 1,
                'const_type' => 0,
                'title' => '工事２',
                'date_from' => '2019-11-21',
                'date_to' => '2019-12-31',
                'state' => 0,
                'progress' => 0.0,
                'resource_cost' => 220000,
                'person_cost' => 200000,
                'histry' => '[]',
                'deleted_at' => NULL,
                'created_at' => '2019-12-02 00:00:00',
                'updated_at' => '2019-12-03 00:00:00',
            ),
        ));
        
        
    }
}