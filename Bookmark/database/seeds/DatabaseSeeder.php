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
        // ターミナルでこのファイルを実行すると、以下のseederファイルが実行される
        // $this->call(UserSeeder::class);
        $this->call(BookmarksTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
