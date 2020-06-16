<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Bookmark extends Model
{
    protected $fillable=[ // 登録処理などに使用される配列（ここで指定されたフィールドがテーブルに登録される）
        'title', 'url', 'description'
    ];

    protected $with=['tags'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class); // リレーション（１つのブックマークには複数のタグが存在する）
    }
}
