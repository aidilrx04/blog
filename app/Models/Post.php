<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        'slug',
        "content",
        'publish_status',
        'image'
    ];

    public function getUrl()
    {
        return route('posts.show', ['slug' => $this->slug]);
    }
}
