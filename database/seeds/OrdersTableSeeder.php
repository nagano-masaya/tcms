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
                'cont_id' => 1,
                'user_id' => 1,
                'order_date' => '2019-12-18 00:00:00',
                'order_to_id' => NULL,
                'order_to' => '時枝商店',
                'total_price' => 200000000,
                'tax_rate' => 100000,
                'tax' => 20000000,
                'order_price' => 220000000,
                'order_user_id' => 1,
                'order_user_name' => '社員１',
                'term' => NULL,
                'recept_date' => NULL,
                'recepted_date' => NULL,
                'recepted_user_id' => NULL,
                'recepted_user_name' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
