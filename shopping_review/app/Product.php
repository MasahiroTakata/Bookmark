<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id']; // データ登録時、idは不要
    protected $table = 'products'; // テーブル名は複数形、モデル名は単数形というルール

    public static $rules = [  // ルールを決める
        'id' => 'required', // 入力必須
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'delete_flg' => 'required'
    ];

    public function category(){ // 一つの商品は、一つのカテゴリーに所属する
        return $this->belongsTo('App\Category');
    }

    public function scopeFlg ($query, $num) {
        return $query->where ('flg', $num);
    }
}
