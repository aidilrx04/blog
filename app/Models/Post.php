<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image_id',
        'excerpt'
    ];

    protected $with = [
        'image'
    ];

    public function image(): HasOne
    {
        return $this->hasOne(Upload::class, 'image_id');
    }
}
