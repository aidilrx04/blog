<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('index', compact('posts'));
    }
}
