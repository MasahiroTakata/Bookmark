<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id'); //id 自動増分するint型フィールド
            $table->integer('custmer_id')->unsigned(); // カスタマーID （外部キー）
            $table->integer('product_id')->unsigned(); // 商品ID（外部キー）
            $table->integer('quantity'); // 数量
            $table->boolean('discount_flg')->default(false); // 割引フラグ
            $table->timestamps();

            $table->index('custmer_id'); // インデックスの作成（外部キー制約を用いる場合はそういうルール）多分、検索効率を上げるため
            $table->index('product_id');

            $table->foreign('custmer_id')->references('id')->on('custmers'); // テーブルのIDを外部キーに設定
            $table->foreign('product_id')->references('id')->on('products'); // テーブルのIDを外部キーに設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
