<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    protected $fillable = [
        'name',
        'file'
    ];

    public static function uploadFile(string $name, mixed $file_content)
    {
        // store in uploads disk
        $disk = Storage::disk('uploads');

        $success = $disk->put($name, $file_content);

        return $success;
    }
}
