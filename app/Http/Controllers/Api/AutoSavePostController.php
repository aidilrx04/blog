<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AutoSavePostController extends Controller
{
    public function auto_save_post(Request $request)
    {

        $validated = $request->validate([
            'post_id' => 'required|integer',
            'title' => 'nullable|string',
            'slug' => 'nullable|string',
            'content' => 'nullable|string'
        ]);

        $post = Post::find($validated['post_id']);

        if (!$post) return response()->json([], 400);

        $post->title = $validated['title'] ?? $post->title;
        $post->slug = $validated['slug'] ?? $post->slug;
        $post->content = $validated['content'] ?? $post->content;

        $post->save();

        return response()->json($post, 200);
    }
}
