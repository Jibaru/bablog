<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class File extends Model
{
    protected $table = 'files';

    protected $fillable =
        [
            'id',
            'name',
            'format',
            'path',
            'type'
        ];

    protected $hidden =
        [
            'created_at',
            'updated_at'
        ];

    protected $appends =
        [
            'url'
        ];

    public function getUrlAttribute()
    {
        $DEV = 'http://127.0.0.1:8000';
        $PROD = "https://jibaru-blog.herokuapp.com";
        return $DEV.$this->path;
    }
}
