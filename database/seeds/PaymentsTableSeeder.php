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
                'orderclaim_id' => 1,
                'pay_dispose_date' => NULL,
                'pay_confirm_date' => NULL,
                'payed_date' => NULL,
                'pay_method' => NULL,
                'pay_dispose_uid' => NULL,
                'pay_dispose_uname' => NULL,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}