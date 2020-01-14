<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('person')->delete();
        
        \DB::table('person')->insert(array (
            0 => 
            array (
                'person_id' => 1,
                'pname' => '安倍',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:44:39',
                'updated_at' => '2019-12-29 17:44:39',
            ),
            1 => 
            array (
                'person_id' => 2,
                'pname' => '伊東',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:06',
                'updated_at' => '2019-12-29 17:45:06',
            ),
            2 => 
            array (
                'person_id' => 3,
                'pname' => '内海',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:30',
                'updated_at' => '2019-12-29 17:45:30',
            ),
            3 => 
            array (
                'person_id' => 4,
                'pname' => '江田島',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:45:44',
                'updated_at' => '2019-12-29 17:45:44',
            ),
            4 => 
            array (
                'person_id' => 5,
                'pname' => '勘解由小路',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:49:55',
                'updated_at' => '2019-12-29 17:49:55',
            ),
            5 => 
            array (
                'person_id' => 6,
                'pname' => '釈迦牟尼仏',
                'full_pname' => '',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => '2019-12-29 17:50:27',
                'updated_at' => '2019-12-29 17:50:27',
            ),
            6 => 
            array (
                'person_id' => 7,
                'pname' => '小倉 ',
                'full_pname' => '小倉 佐千雄',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'person_id' => 8,
                'pname' => '川上 ',
                'full_pname' => '川上 豊秋',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'person_id' => 9,
                'pname' => '平川 ',
                'full_pname' => '平川 泰秀',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'person_id' => 10,
                'pname' => '本田 ',
                'full_pname' => '本田 芳弘',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'person_id' => 11,
                'pname' => '秋田 ',
                'full_pname' => '秋田 詔勝',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'person_id' => 12,
                'pname' => '山口 ',
                'full_pname' => '山口 雅生',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'person_id' => 13,
                'pname' => '井口 ',
                'full_pname' => '井口 喜代信',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'person_id' => 14,
                'pname' => '西野 ',
                'full_pname' => '西野 常一',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'person_id' => 15,
                'pname' => '小川 ',
                'full_pname' => '小川 君吉',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'person_id' => 16,
                'pname' => '西 ',
                'full_pname' => '西 周平',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'person_id' => 17,
                'pname' => '稲垣 ',
                'full_pname' => '稲垣 心一',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'person_id' => 18,
                'pname' => '森岡 ',
                'full_pname' => '森岡 訓',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'person_id' => 19,
                'pname' => '浜田 ',
                'full_pname' => '浜田 益已',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'person_id' => 20,
                'pname' => '高田 ',
                'full_pname' => '高田 明久',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'person_id' => 21,
                'pname' => '山崎 ',
                'full_pname' => '山崎 共成',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'person_id' => 22,
                'pname' => '小原 ',
                'full_pname' => '小原 喜重',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'person_id' => 23,
                'pname' => '手塚 ',
                'full_pname' => '手塚 昭二',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'person_id' => 24,
                'pname' => '堀川 ',
                'full_pname' => '堀川 俊次',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'person_id' => 25,
                'pname' => '谷本 ',
                'full_pname' => '谷本 好博',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'person_id' => 26,
                'pname' => '武井 ',
                'full_pname' => '武井 永寿',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'person_id' => 27,
                'pname' => '松永 ',
                'full_pname' => '松永 れいや',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'person_id' => 28,
                'pname' => '平田 ',
                'full_pname' => '平田 宏幸',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'person_id' => 29,
                'pname' => '小山 ',
                'full_pname' => '小山 喜治',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'person_id' => 30,
                'pname' => '西川 ',
                'full_pname' => '西川 良司',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'person_id' => 31,
                'pname' => '福井 ',
                'full_pname' => '福井 義将',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'person_id' => 32,
                'pname' => '平田 ',
                'full_pname' => '平田 雅義',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'person_id' => 33,
                'pname' => '江口 ',
                'full_pname' => '江口 和好',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'person_id' => 34,
                'pname' => '石川 ',
                'full_pname' => '石川 憲志',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'person_id' => 35,
                'pname' => '小沢 ',
                'full_pname' => '小沢 智勝',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'person_id' => 36,
                'pname' => '松崎 ',
                'full_pname' => '松崎 保平',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'person_id' => 37,
                'pname' => '庄司 ',
                'full_pname' => '庄司 宏弥',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'person_id' => 38,
                'pname' => '藤村 ',
                'full_pname' => '藤村 信好',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'person_id' => 39,
                'pname' => '岩田 ',
                'full_pname' => '岩田 洋助',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'person_id' => 40,
                'pname' => '松浦 ',
                'full_pname' => '松浦 保平',
                'role' => '',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}