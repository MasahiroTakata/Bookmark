<?php

use Illuminate\Database\Seeder;

class CustmersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('custmers')->insert([
            [
                'name'    => 'テスト太郎',
                'email'      => 'test@gmail.com',
                'address1'          => '明石市',
                'address2'          => '大久保町',
                'password'          => 'abcdefgh',
                'discount_flg'       => 0
            ]
        ]);
    }
}
