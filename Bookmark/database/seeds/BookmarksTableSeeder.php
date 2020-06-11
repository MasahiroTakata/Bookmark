<?php

use Illuminate\Database\Seeder;
use App\Bookmark;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 100件作成する
        factory(Bookmark::class, 100)->create();
    }
}
