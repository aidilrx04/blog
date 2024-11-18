<?php

namespace Database\Seeders;

use App\Models\Post;
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

        Post::factory()->create([
            'content' => $base_file
        ]);

        Post::factory()->count($amount)->create();
    }
}
