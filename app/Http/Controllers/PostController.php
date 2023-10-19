<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function store(PostCreateRequest $request)
    {
        $slug = Str::slug($request->title);

        Post::create([
            'slug' => $slug,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post has successfully created.');
    }
}
