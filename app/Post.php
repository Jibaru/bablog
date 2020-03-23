<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable =
        [
            'id',
            'title',
            'date_time',
            'type',
            'content'
        ];

    protected $hidden =
        [
            'created_at',
            'updated_at',
            'user_id',
            'category_id'
        ];

    protected $appends =
        [
            'comments_count',
            'likes_count',
            'views_count',
            'viewed',
            'liked'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')
            ->with(['role', 'file']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->with('user')
            ->where('thread', '=', null)
            ->orderBy('created_at', 'desc');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class)->with('user');
    }

    public function views()
    {
        return $this->hasMany(PostView::class)->with('user');
    }

    public function frontImage()
    {
        return $this->hasOne(PostImage::class)->with('file');
    }

    public function getCommentsCountAttribute()
    {
        return $this->hasMany(Comment::class)->count();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getViewsCountAttribute()
    {
        return $this->views()->count();
    }

    public function getViewedAttribute()
    {
        return (Auth::user()) ? $this->views()
            ->get()
            ->where('user.id', '=', Auth::user()->id)
            ->isNotEmpty(): false;
    }

    public function getLikedAttribute()
    {
        return (Auth::user()) ? $this->likes()
            ->get()
            ->where('user.id', '=', Auth::user()->id)
            ->isNotEmpty() : false;
    }
}
