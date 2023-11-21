<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'body' => ['required', 'min:5'],
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('posts.show', $post->id)
            ->with('message', 'Comment successfully saved.');
    }
}
