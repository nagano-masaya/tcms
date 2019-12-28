<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('orders')->delete();

        \DB::table('orders')->insert(array (
            0 =>
            array (
                'order_id' => 1,
                'order_date' => '2019-12-18 00:00:00',
                'order_to_id' => 1,
                'order_to_name' => '時枝商店',
                'total_price' => 200000000,
                'tax' => 20000000,
                'tax_rate' => 100000,
                'order_price' => 220000000,
                'cont_id' => 1,
                'order_user_id' => 1,
                'order_user_name' => '社員１',
                'term' => NULL,
                'recept_date' => '2019-12-01 00:00:00',
                'payment_due_date' => '2019-12-02 00:00:00',
                'recept_due_date' => '2019-12-03 00:00:00',
                'recept_place' => '現場',
                'recepted_date' => '2019-12-03 00:00:00',
                'recepted_user_id' => 0,
                'recepted_user_name' => '',
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-12-25 14:36:50',
                'updated_at' => '2019-12-25 14:37:30',
            ),
        ));


    }
}
