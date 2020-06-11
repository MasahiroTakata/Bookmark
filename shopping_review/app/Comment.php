<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id']; // データ登録時、idは不要
    protected $table = 'comments'; // テーブル名は複数形、モデル名は単数形というルール

    public function custmer(){ // 一つの商品は、一つのカテゴリーに所属する
        return $this->belongsTo('App\Custmer');
    }
    public function product(){ // 一つの商品は、一つのカテゴリーに所属する
        return $this->belongsTo('App\Product');
    }
}