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
            'thread',
            'user_id',
            'post_id'
        ];

    protected $hidden =
        [
            'created_at',
            'updated_at'
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
