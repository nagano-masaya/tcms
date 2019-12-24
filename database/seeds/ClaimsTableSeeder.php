<?php

use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('claims')->delete();
        
        \DB::table('claims')->insert(array (
            0 => 
            array (
                'claim_id' => 1,
                'company_id' => 1,
                'user_id' => 1,
                'price' => 500000000,
                'claim_date' => '2019-12-10 00:00:00',
                'claim_make_date' => '2019-12-26 00:00:00',
                'claim_sent_date' => '2019-12-18 00:00:00',
                'pay_date' => NULL,
                'pay_price' => 500000000,
                'price_total' => 500000000,
                'tax_rate' => 10,
                'tax' => 50000000,
                'taxed_price' => 550000000,
                'discount_price' => 20000000,
                'offset_price' => 10000000,
                'details' => '[{"rowid":0,"clmdetail_id":1,"cont_id":1,"cont_text":"工事１","text":"工事１－解体","unit_price":2000000,"qty":1,"price":2000000,"deleted":false},{"rowid":1,"clmdetail_id":2,"cont_id":1,"cont_text":"工事１","text":"工事１－撤去","unit_price":500000,"qty":1,"price":500000,"deleted":false}]',
                'history' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-12-21 00:00:29',
            ),
        ));
        
        
    }
}