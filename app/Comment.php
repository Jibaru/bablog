<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable =
        [
            'id',
            'content',
            'date_time',
            'thread'
        ];

    protected $hidden =
        [
            'created_at',
            'updated_at',
            'user_id',
            'post_id'
        ];

    protected $appends =
        [
            'replies'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function getRepliesAttribute()
    {
        return Comment::with('user')->where('thread','=', $this->id)->get();
    }
}
