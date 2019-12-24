<?php

use Illuminate\Database\Seeder;

class ContructsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contructs')->delete();
        
        \DB::table('contructs')->insert(array (
            0 => 
            array (
                'cont_id' => 1,
                'name' => '工事１-1',
                'date_from' => '2019-11-15',
                'date_to' => '2020-01-19',
                'customer' => '施主11',
                'cust_company_id' => 1,
                'cust_company' => '発注元１',
                'cust_person' => NULL,
                'price' => 20000000,
                'budget_remain' => 0,
                'state' => 0,
                'exec_budget' => 14000000,
                'price_taxed' => 500000000,
                'claim_remain' => 0,
                'deposit_remain' => 0,
                'documents' => NULL,
                'comment' => NULL,
                'sales_person' => NULL,
                'const_admin' => NULL,
                'update_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-12-08 16:13:58',
            ),
            1 => 
            array (
                'cont_id' => 2,
                'name' => 'aaaaaaaa',
                'date_from' => '2019-12-01',
                'date_to' => '2019-12-31',
                'customer' => '辻田兼臣',
                'cust_company_id' => 0,
                'cust_company' => '有限会社辻田建機',
                'cust_person' => NULL,
                'price' => 5000000000,
                'budget_remain' => 0,
                'state' => 0,
                'exec_budget' => 330000000,
                'price_taxed' => 60000000,
                'claim_remain' => 50000000,
                'deposit_remain' => 50000000,
                'documents' => NULL,
                'comment' => NULL,
                'sales_person' => NULL,
                'const_admin' => NULL,
                'update_by' => 0,
                'deleted_at' => NULL,
                'created_at' => '2019-12-08 16:32:29',
                'updated_at' => '2019-12-09 01:41:18',
            ),
            2 => 
            array (
                'cont_id' => 3,
                'name' => '工事１-3',
                'date_from' => '2019-11-15',
                'date_to' => '2020-01-19',
                'customer' => '施主11',
                'cust_company_id' => 1,
                'cust_company' => '発注元１',
                'cust_person' => NULL,
                'price' => 40000000,
                'budget_remain' => 0,
                'state' => 0,
                'exec_budget' => 14000000,
                'price_taxed' => 500000000,
                'claim_remain' => 0,
                'deposit_remain' => 0,
                'documents' => NULL,
                'comment' => NULL,
                'sales_person' => NULL,
                'const_admin' => NULL,
                'update_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-12-08 16:13:58',
            ),
        ));
        
        
    }
}