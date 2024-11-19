<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{
    public function generate_slug(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string'
        ]);

        // generate slugs
        $slug = Str::slug($validated['title']);

        // check for existing slugs

        while (true) {

            $is_exist = Post::where('slug', $slug)->count() > 0;

            if ($is_exist) {
                $slug .= Str::random(6);
                continue;
            }

            break;
        }

        return response()->json([
            'slug' => $slug,
        ]);
    }
}
