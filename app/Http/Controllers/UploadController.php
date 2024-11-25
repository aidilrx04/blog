<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function view(Upload $file)
    {

        $file_path = storage_path('app/private/uploads/' . $file->file);

        return response()->file($file_path);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'file|image'
        ]);

        $file = $request->file('file');

        $hash_name = $file->hashName();


        // move file to upload storage
        $move_success = Storage::disk('uploads')->put($hash_name, $file->getcontent());


        if ($move_success === false) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload the file'
            ], 500);
        }

        // create new upload record
        $upload = Upload::create([
            'name' => $hash_name,
            'file' => $hash_name
        ]);

        return response()->json($upload, 200);
    }
}
