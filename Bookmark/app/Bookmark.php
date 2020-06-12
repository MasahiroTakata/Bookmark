<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable=[ // 登録処理などに使用される配列（ここで登録に必要なフィールドを指定できる）
        'title', 'url', 'description'
    ];
}
