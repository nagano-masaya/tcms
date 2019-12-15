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
                'price' => 5000000000000000,
                'claim_date' => '2019-12-10 00:00:00',
                'claim_make_date' => '2019-12-26 00:00:00',
                'claim_sent_date' => '2019-12-18 00:00:00',
                'pay_date' => NULL,
                'pay_price' => 1200000000000000,
                'price_total' => 0,
                'tax_rate' => 0,
                'tax' => 0,
                'taxed_price' => 0,
                'discount_price' => 0,
                'offset_price' => 0,
                'details' => '[{"cont_id":1,"cont_text":"工事1","text":"工事１-土木一式a","unit_price":3500000,"qty":1,"price":3500000,"deleted":false},{"cont_id":2,"cont_text":"工事2","text":"工事2-河川改修aaaa","unit_price":3500000,"qty":1,"price":3500000,"deleted":false}]',
                'history' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-12-13 18:06:18',
            ),
        ));
        
        
    }
}