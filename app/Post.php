<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'header',
        'body',
        'tags'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function comments(){
        return $this->hasMany(Comment::class);
    }
}
