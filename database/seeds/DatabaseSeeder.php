<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //----------------------------------------------
        //  Users (DEBUG)
        //----------------------------------------------
        DB::table('users')->insert(
          [
            'id'=>1,
            'name'=>'利用者１',
            'email'=>'nagano-m@tsujita-group.com',
            'email_verified_at'=>'',
            'password'=>'$2y$10$86kWLjuIfcv1Ae8HrxX41ObtX1r7nZTBSqnrJLLvyKdwsOakn/Rye',
            'remember_token'=>'i3LaogBVyawt3A2DB56HufQhd3Wejo5V5198JBi3MyIY7mftRMgceHijk0le',
            'role'=>'engineer',
            'created_at'=>new DateTime(2019,12,1,0,0,0),
            'updated_at'=>new DateTime(2019,12,1,0,0,0)
          ]);
        //----------------------------------------------
        //  Contracts(DEBUG)
        //----------------------------------------------
        DB::table('contructs')->insert(
          [
            'cont_id'=>1,
            'name'=>'工事１-2',
            'date_from'=>new DateTime('2019-11-15'),
            'date_to'=>new DateTime('2020-01-19'),
            'customer'=>'施主11',
            'cust_company'=>'発注元１',
            'cust_person'=>null,
            'price'=>20000000,
            'budget_remain'=>0,
            'state'=>0,
            'exec_budget'=>14000000,
            'price_taxed'=>500000000,
            'claim_remain'=>0,
            'deposit_remain'=>0,
            'documents'=>null,
            'comment'=>null,
            'sales_person'=>null,
            'const_admin'=>null,
            'update_by'=>0,
            'deleted_at'=>null,
            'created_at'=>new DateTime('2019-12-08 16:13:58'),
            'updated_at'=>new DateTime('2019-12-08 16:13:58')    $this->call(ClaimsTableSeeder::class);
        $this->call(ContructsTableSeeder::class);
        $this->call(ConstructsTableSeeder::class);
        $this->call(ConsttypesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(DepositTableSeeder::class);
        $this->call(DepositDispTableSeeder::class);
    }
          ]);
          DB::table('contructs')->insert(
            [
              'cont_id'=>2,
              'name'=>'aaaaaaaa',
              'date_from'=>new DateTime('2019-12-01'),
              'date_to'=>new DateTime('2019-12-31'),
              'customer'=>'江田島平八',
              'cust_company'=>'有限会社辻田建機'
              ,'cust_person'=>null,
              'price'=>5000000000,
              'budget_remain'=>0,
              'state'=>0,
              'exec_budget'=>330000000,
              'price_taxed'=>60000000,
              'claim_remain'=>50000000,
              'deposit_remain'=>50000000,
              'documents'=>null,
              'comment'=>null,
              'sales_person'=>null,
              'const_admin'=>null,
              'update_by'=>0,
              'deleted_at'=>null,
              'created_at'=>new DateTime('2019-12-08 16:32:29'),
              'updated_at'=>new DateTime('2019-12-09 01:41:18')
            ]);
        //----------------------------------------------
        // 工種テーブル
        //----------------------------------------------
        DB::table('consttypes')->insert(['id'=>01,'name'=>'土木一式','fullname'=>'土木一式']);
        DB::table('consttypes')->insert(['id'=>02,'name'=>'建築一式','fullname'=>'建築一式']);
        DB::table('consttypes')->insert(['id'=>03,'name'=>'大工','fullname'=>'大工']);
        DB::table('consttypes')->insert(['id'=>04,'name'=>'左官','fullname'=>'左官']);
        DB::table('consttypes')->insert(['id'=>05,'name'=>'とび・土工・ｺﾝｸﾘ-ﾄ','fullname'=>'とび・土工・ｺﾝｸﾘ-ﾄ']);
        DB::table('consttypes')->insert(['id'=>06,'name'=>'石','fullname'=>'石']);
        DB::table('consttypes')->insert(['id'=>07,'name'=>'屋根','fullname'=>'屋根']);
        DB::table('consttypes')->insert(['id'=>08,'name'=>'電気','fullname'=>'電気']);
        DB::table('consttypes')->insert(['id'=>09,'name'=>'管','fullname'=>'管']);
        DB::table('consttypes')->insert(['id'=>10,'name'=>'ﾀｲﾙ・れんが・ﾌﾞﾛｯｸ','fullname'=>'ﾀｲﾙ・れんが・ﾌﾞﾛｯｸ']);
        DB::table('consttypes')->insert(['id'=>11,'name'=>'鋼構造物','fullname'=>'鋼構造物']);
        DB::table('consttypes')->insert(['id'=>12,'name'=>'鉄筋','fullname'=>'鉄筋']);
        DB::table('consttypes')->insert(['id'=>13,'name'=>'ほ装','fullname'=>'ほ装']);
        DB::table('consttypes')->insert(['id'=>14,'name'=>'しゅんせつ','fullname'=>'しゅんせつ']);
        DB::table('consttypes')->insert(['id'=>15,'name'=>'板金','fullname'=>'板金']);
        DB::table('consttypes')->insert(['id'=>16,'name'=>'ｶﾞﾗｽ工事','fullname'=>'ｶﾞﾗｽ工事']);
        DB::table('consttypes')->insert(['id'=>17,'name'=>'塗装','fullname'=>'塗装']);
        DB::table('consttypes')->insert(['id'=>18,'name'=>'防水','fullname'=>'防水']);
        DB::table('consttypes')->insert(['id'=>19,'name'=>'内装仕上','fullname'=>'内装仕上']);
        DB::table('consttypes')->insert(['id'=>20,'name'=>'機械器具設置','fullname'=>'機械器具設置']);
        DB::table('consttypes')->insert(['id'=>21,'name'=>'熱絶縁','fullname'=>'熱絶縁']);
        DB::table('consttypes')->insert(['id'=>22,'name'=>'電気通信','fullname'=>'電気通信']);
        DB::table('consttypes')->insert(['id'=>23,'name'=>'造園','fullname'=>'造園']);
        DB::table('consttypes')->insert(['id'=>24,'name'=>'さく井','fullname'=>'さく井']);
        DB::table('consttypes')->insert(['id'=>25,'name'=>'建具','fullname'=>'建具']);
        DB::table('consttypes')->insert(['id'=>26,'name'=>'水道施設','fullname'=>'水道施設']);
        DB::table('consttypes')->insert(['id'=>27,'name'=>'消防施設','fullname'=>'消防施設']);
        DB::table('consttypes')->insert(['id'=>28,'name'=>'清掃施設','fullname'=>'清掃施設']);
        DB::table('consttypes')->insert(['id'=>29,'name'=>'その他','fullname'=>'その他']);
        DB::table('consttypes')->insert(['id'=>30,'name'=>'建設業法以外','fullname'=>'建設業法以外']);
    }
}
