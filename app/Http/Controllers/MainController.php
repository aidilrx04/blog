<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {

        $posts = Post::where('publish_status', 'published')
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view("components.main.index", compact("posts"));
    }

    public function show(string $slug)
    {
        $post = Post::where("slug", $slug)->first();

        if (!$post) abort(404);

        if ($post->publish_status !== 'published') abort(404);
        return view("components.main.show", compact("post"));
    }

    public function sitemap()
    {
        $posts = Post::wherePublishStatus("published")->get();

        return response(view("components.main.sitemap", compact('posts')), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
