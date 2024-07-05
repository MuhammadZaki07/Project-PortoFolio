<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['content', 'user_id', 'post_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class, 'comment_id');
    }

    public function likesCount()
    {
        return $this->hasOne(Likes::class)
            ->selectRaw('comment_id, count(*) as aggregate')
            ->groupBy('comment_id');
    }
}
