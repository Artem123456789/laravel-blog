<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'header',
        'body',
        'tags'
    ];

    protected $primaryKey = 'id';

    function user(){
        return $this->belongsTo(User::class);
    }

    function comments(){
        return $this->hasMany(Comment::class);
    }
}
