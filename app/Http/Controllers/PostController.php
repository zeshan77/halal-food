<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        DB::listen(static function ($q) {
            logger('listen to queries', [
                'query' => $q->sql,
                'bindings' => $q->bindings,
            ]);
        });

        $posts = Post::latest('id')->paginate(10);

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

        $path = $request->file('picture')->store('', 'public');

        Post::create([
            'user_id' => Auth::user()->id,
            'slug' => $slug,
            'title' => $request->title,
            'body' => $request->body,
            'picture' => $path,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post has successfully created.');
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post, PostUpdateRequest $request): RedirectResponse
    {
        Post::where('id', $post->id)
            ->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);

        return redirect()
            ->route('posts.index')
            ->with('message', "Post {$post->id} was successfully updated.");
    }

    public function delete(Post $post)
    {
        return view('posts.delete', [
            'post' => $post,
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        Storage::disk('public')
            ->delete($post->picture);


        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', "Post {$post->id} was successfully deleted.");
    }
}
