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
                'pay_disposal_date' => NULL,
                'pay_comfirm_date' => NULL,
                'payed_date' => NULL,
                'pay_method' => NULL,
                'pay_dsipose_uid' => NULL,
                'pay_dispaose_uname' => NULL,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}