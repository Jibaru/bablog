<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'posts_images';

    protected $fillable =
        [
            'id'
        ];

    protected $hidden =
        [
            'created_at',
            'updated_at',
            'file_id',
            'post_id'
        ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
