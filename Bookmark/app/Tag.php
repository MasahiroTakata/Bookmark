<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Bookmark;

class Tag extends Model
{
    protected $fillable = [
      'title'
    ];

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class); // リレーション（１つのブックマークには複数のタグが存在する）
    }

}
