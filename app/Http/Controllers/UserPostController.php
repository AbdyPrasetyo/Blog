<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan semua post milik pengguna yang sedang login
        $posts = Post::where('user_id', $userId)->get();

        return view('user.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambahpost');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('user.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('user.editpost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('user.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data post
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('user.posts.index')->with('success', 'Post deleted successfully.');
    }
}
