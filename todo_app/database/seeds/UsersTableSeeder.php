<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 呼ばれたら実行するメソッド
     * @return void
     */
    public function run()
    {
        // テストデータの登録
        // DB::table('users')->insert([
        //     'name' => 'test1',
        //     'email' => 'test1@test.com',
        //     'password' => bcrypt('test1') 
        // ]);
    }
}