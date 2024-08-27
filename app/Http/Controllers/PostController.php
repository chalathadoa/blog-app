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
        // $this->authorize('admin', 'author');
        $posts = Post::all();
        return view('post.post', compact('posts'));
    }

    public function create()
    {
        $accounts = User::all();
        return view('post.create', compact('accounts'));
    }

    public function store(Request $request)
    {
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

        return redirect()->route('post.post')->with('success', 'Post created successfully.');
    }

    public function edit($idpost)
    {
        $post = Post::findOrFail($idpost);
        $accounts = User::all();
        return view('post.edit', compact('post', 'accounts'));
    }

    public function update(Request $request, $idpost)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'username' => 'required|exists:account,username',
        ]);

        $post = Post::findOrFail($idpost);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $request->username,
        ]);

        return redirect()->route('post.post')->with('success', 'Post updated successfully.');
    }

    public function destroy($idpost)
    {
        $post = Post::findOrFail($idpost);
        $post->delete();

        return redirect()->route('post.post')->with('success', 'Post deleted successfully.');
    }
}
