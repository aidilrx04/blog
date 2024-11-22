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


    /**
     * Upload file
     *
     * @param  string $name
     * @param  mixed $file_content can be file binary
     * @return \App\Models\Upload|false
     */
    public static function uploadFile(string $name, mixed $file_content)
    {
        // store in uploads disk
        $disk = Storage::disk('uploads');

        $success = $disk->put($name, $file_content);

        if ($success === false) {
            return false;
        }


        $upload = Upload::create([
            'name' => $name,
            'file' => $name
        ]);

        return $upload;
    }
}
