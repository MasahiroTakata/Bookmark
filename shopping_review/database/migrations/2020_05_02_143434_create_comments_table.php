<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned(); // 商品ID （外部キー）
            $table->integer('custmer_id')->unsigned(); // 顧客ID （外部キー）
            $table->text('comment'); // コメント
            // マネージャIDは後ほど追加予定
            $table->boolean('approval')->default(false); // 承認・非承認のフラグ
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products'); // 商品テーブルのIDを外部キーに設定
            $table->foreign('custmer_id')->references('id')->on('custmers'); // ユーザテーブルのIDを外部キーに設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
