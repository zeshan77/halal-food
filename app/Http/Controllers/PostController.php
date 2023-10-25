<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request): RedirectResponse
    {
        $slug = Str::slug($request->title);

        Post::create([
            'user_id' => Auth::user()->id,
            'slug' => $slug,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post has successfully created.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post, PostUpdateRequest $request): RedirectResponse
    {
        Post::where('id', $post)
            ->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);

        return redirect()
            ->route('posts.index')
            ->with('message', "Post {$post} was successfully updated.");
    }

    public function delete($post)
    {
        $post = Post::where('id', $post)->first();

        return view('posts.delete', [
            'post' => $post,
        ]);
    }

    public function destroy($post): RedirectResponse
    {
        Post::where('id', $post)
            ->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', "Post {$post} was successfully deleted.");
    }
}
