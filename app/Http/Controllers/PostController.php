<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('welcome', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        }
        $post->delete();
        return redirect('dashboard');
    }
}
