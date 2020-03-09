<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');//id 自動増分するint型フィールド
            $table->integer('category_id')->unsigned();// カテゴリーID （外部キー）
            $table->string('name');// 名前
            $table->integer('price');// 価格
            $table->text('image');// 画像
            $table->boolean('delete_flg')->default(false); // 削除フラグ
            $table->timestamps();

            $table->index('category_id'); // インデックスの作成（外部キー制約を用いる場合はそういうルール）多分、検索効率を上げるため
            $table->foreign('category_id')->references('id')->on('categorys'); // カテゴリーテーブルのIDを外部キーに設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
