<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id']; // データ登録時、idは不要
    protected $table = 'categorys'; // テーブル名は複数形、モデル名は単数形というルール

    public static $rules = [
        'id' => 'required', // 入力必須
        'name' => 'required'
    ];

    public function products() // １つのカテゴリーには複数の商品がある
    {
        return $this->hasMany('App\Product');
    }

    public function scopeFlg ($query, $num) {
        return $query->where ('flg', $num);
    }
}
