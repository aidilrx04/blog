<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Upload;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = 5;

        // create base post with each tag for styling
        $base_file = File::get(storage_path("app/private/post_base.html"));
        $image = Upload::first();

        Post::factory()->create([
            'content' => $base_file,
            'image_id' => $image->id
        ]);

        Post::factory()->count($amount)->create([
            'image_id' => $image->id
        ]);
    }
}
