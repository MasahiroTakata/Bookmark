<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id']; // データを保存する時に、「id」は要らないという意味
    protected $table = 'todo'; // テーブル名

    public static $rules = [ // カラムの定義
        'title' => 'required',
        'content' => 'required',
    ];

    public function scopeFlg ($query, $num) { // ローカルスコープ
        return $query->where ('flg', $num);
    }
}
