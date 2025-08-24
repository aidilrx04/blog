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

    public function show(Post $post)
    {
        if ($post->publish_status !== 'published') abort(404);
        return view("components.main.show", compact("post"));
    }
}
