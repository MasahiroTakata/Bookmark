<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id'    => 1,
                'name'      => 'もも',
                'price'          => 230,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0014.png',
            ],
            [
                'category_id'    => 2,
                'name'      => 'すいか',
                'price'          => 400,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0009.png',
            ],
            [
                'category_id'    => 2,
                'name'      => 'なす',
                'price'          => 230,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0005.png',
            ],
            [
                'category_id'    => 1,
                'name'      => 'なし',
                'price'          => 400,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0008.png',
            ],
            [
                'category_id'    => 1,
                'name'      => 'りんご',
                'price'          => 360,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0012.png',
            ],
            [
                'category_id'    => 1,
                'name'      => 'メロン',
                'price'          => 1000,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0037.png',
            ],
            [
                'category_id'    => 2,
                'name'      => 'キャベツ',
                'price'          => 500,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0025.png',
            ],
            [
                'category_id'    => 2,
                'name'      => 'かぶ',
                'price'          => 300,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0026.png',
            ],
            [
                'category_id'    => 1,
                'name'      => 'ぶどう',
                'price'          => 360,
                'image'       => 'http://www.pictcan.com/wp-content/uploads/item-0034.png',
            ],

        ]);
    }
}
