<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Upload;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {

        // create post for reference

        $post = new Post([
            'title' => '',
            'content' => '',
            'slug' => '',
        ]);

        $post->save();

        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|integer',
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'image'
        ]);

        $post = Post::find($validated['post_id']);

        if ($request->has('image')) {
            $image = $request->file('image');

            $filename = $image->hashName();

            $upload = Upload::uploadFile($filename, $image->getContent());

            if ($upload) {
                $post->image()->associate($upload);
            }
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'status' => PostStatus::PUBLISHED
        ]);


        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.posts.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
