<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function view(Upload $file)
    {

        $file_path = storage_path('app/private/uploads/' . $file->file);

        return response()->file($file_path);
    }
}
