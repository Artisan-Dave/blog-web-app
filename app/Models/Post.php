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
        'slug',
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

}
