<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index', [
            'posts' => $post->paginate(7)
        ]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $post = $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:1024',
        ]);
        Post::create($post);

        $post->addMediaFromRequest('image')->toMediaCollection('images');

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
