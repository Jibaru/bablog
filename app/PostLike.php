<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $table = 'posts_likes';

    protected $fillable =
        [
            'id',

        ];

    protected $hidden =
        [
            'created_at',
            'updated_at',
            'user_id',
            'post_id'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
