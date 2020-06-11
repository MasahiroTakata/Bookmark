<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
            [
                'id' => 1,
                'name' => '果物',
            ],
            [
                'id' => 2,
                'name' => '野菜'
            ]
        ]);
    }
}
