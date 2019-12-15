<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '利用者１',
                'email' => 'nagano-m@tsujita-group.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$86kWLjuIfcv1Ae8HrxX41ObtX1r7nZTBSqnrJLLvyKdwsOakn/Rye',
                'remember_token' => '26yh4vbxiNafcHmJQL8MEe0UQq4UPoUttyAVHENIjAkmhTIe9NB1yabQ9bGU',
                'role' => '',
                'created_at' => '2019-12-06 12:15:35',
                'updated_at' => '2019-12-06 12:15:35',
            ),
        ));
        
        
    }
}