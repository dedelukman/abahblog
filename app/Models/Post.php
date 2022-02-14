<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'user_id', 'category_id'];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

     /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
