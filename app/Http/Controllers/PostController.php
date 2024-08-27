<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::all();
        return view('post.post', compact('posts'));
    }

    public function create()
    {
        $this->authorize('admin', 'author');
        $accounts = User::all();
        return view('post.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin', 'author');
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'username' => 'required|exists:account,username',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => Carbon::now(),
            'username' => $request->username,
        ]);

        return redirect()->route('post')->with('success', 'Post created successfully.');
    }

    public function edit($idpost)
    {
        $this->authorize('admin', 'author');
        $post = Post::findOrFail($idpost);
        $accounts = User::all();
        return view('post.edit', compact('post', 'accounts'));
    }

    public function update(Request $request, $idpost)
    {
        $this->authorize('admin', 'author');
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'username' => 'required|exists:account,username',
        ]);

        $post = Post::findOrFail($idpost);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => Carbon::now(),
            'username' => $request->username,
        ]);

        return redirect()->route('post')->with('success', 'Post updated successfully.');
    }

    public function destroy($idpost)
    {
        $this->authorize('admin', 'author');
        $post = Post::findOrFail($idpost);
        $post->delete();

        return redirect()->route('post')->with('success', 'Post deleted successfully.');
    }
}
