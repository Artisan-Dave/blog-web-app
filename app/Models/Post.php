<?php

namespace App\Models;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;
     protected $fillable = [
        'title',
        'body',
        'category_id',
        'slug',
        'image',
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
