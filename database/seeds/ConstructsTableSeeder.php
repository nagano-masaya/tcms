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
                'const_type_id' => 0,
                'const_type_name' => '一般土木',
                'const_name' => '現場１',
                'date_from' => '2020-01-07 20:01:07',
                'date_to' => '2020-01-07 20:01:07',
                'date_start' => '2020-01-07 20:01:07',
                'date_end' => NULL,
                'person_id' => 1,
                'person_name' => '担当１',
                'state' => '0',
                'progress' => 20.0,
                'exec_budget' => 0,
                'resource_cost' => 0,
                'person_cost' => 0,
                'histry' => '[]',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-01-07 02:38:13',
            ),
            1 => 
            array (
                'const_id' => 2,
                'cont_id' => 1,
                'user_id' => 1,
                'const_type_id' => 0,
                'const_type_name' => '土木一式 ',
                'const_name' => 'aaaaaa',
                'date_from' => '2020-01-07 20:01:07',
                'date_to' => '2020-01-07 20:01:07',
                'date_start' => NULL,
                'date_end' => NULL,
                'person_id' => 0,
                'person_name' => 'aaaa',
                'state' => '',
                'progress' => 20.0,
                'exec_budget' => 50000000000,
                'resource_cost' => 0,
                'person_cost' => 0,
                'histry' => '[]',
                'deleted_at' => NULL,
                'created_at' => '2020-01-07 01:39:30',
                'updated_at' => '2020-01-07 02:38:13',
            ),
            2 => 
            array (
                'const_id' => 6,
                'cont_id' => 1,
                'user_id' => 1,
                'const_type_id' => 0,
                'const_type_name' => '土木一式 ',
                'const_name' => '1111111',
                'date_from' => '2020-01-07 20:01:07',
                'date_to' => '2020-01-07 20:01:07',
                'date_start' => NULL,
                'date_end' => NULL,
                'person_id' => 0,
                'person_name' => 'ta',
                'state' => '',
                'progress' => 20.0,
                'exec_budget' => 0,
                'resource_cost' => 0,
                'person_cost' => 0,
                'histry' => '[]',
                'deleted_at' => NULL,
                'created_at' => '2020-01-07 03:12:51',
                'updated_at' => '2020-01-07 03:14:28',
            ),
        ));
        
        
    }
}