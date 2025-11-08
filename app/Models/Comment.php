<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'comment',
        'post_id',
        'approved',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // app/Models/Comment.php
    public function getGravatarUrlAttribute()
    {
        $email = trim(strtolower($this->email));
        $hash = md5($email);
        return "https://www.gravatar.com/avatar/$hash?s=80&d=monsterid";
    }

}
