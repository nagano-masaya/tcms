<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payments')->delete();
        
        \DB::table('payments')->insert(array (
            0 => 
            array (
                'payment_id' => 1,
                'order_id' => 1,
                'claim_date' => NULL,
                'payed_date' => NULL,
                'claim_recept_user_id' => 0,
                'claim_recept_user_name' => '',
                'recepted_user_id' => 0,
                'recepted_user_name' => '',
                'memo' => NULL,
                'claims' => NULL,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}