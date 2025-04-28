<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class ,'post_tag');
    }

    public function image()
    {
        if ($this->image) {
            return asset('storage/' . $this->image); // لازم تضيفي 'storage/' بنفسك
        }
        return asset('default.png');
    }

}
