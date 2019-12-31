<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('person')->delete();
        
        \DB::table('person')->insert(array (
            0 => 
            array (
                'person_id' => 1,
                'pname' => '安倍',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:44:39',
                'updated_at' => '2019-12-29 17:44:39',
            ),
            1 => 
            array (
                'person_id' => 2,
                'pname' => '伊東',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:06',
                'updated_at' => '2019-12-29 17:45:06',
            ),
            2 => 
            array (
                'person_id' => 3,
                'pname' => '内海',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:30',
                'updated_at' => '2019-12-29 17:45:30',
            ),
            3 => 
            array (
                'person_id' => 4,
                'pname' => '江田島',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:44',
                'updated_at' => '2019-12-29 17:45:44',
            ),
            4 => 
            array (
                'person_id' => 5,
                'pname' => '勘解由小路',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:49:55',
                'updated_at' => '2019-12-29 17:49:55',
            ),
            5 => 
            array (
                'person_id' => 6,
                'pname' => '釈迦牟尼仏',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:50:27',
                'updated_at' => '2019-12-29 17:50:27',
            ),
        ));
        
        
    }
}