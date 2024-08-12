<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'category_id', 'view', 'content', 'author_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
