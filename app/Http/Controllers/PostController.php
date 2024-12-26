<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    public function create()
    {
        return view('form-create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fileName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads'), $fileName);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = 'uploads/' . $fileName;
        $post->save();

        dd($post);
    }

    public function destroy(Post $post)
    {
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        }
        File::delete($post->image);
        $post->delete();
        return redirect('dashboard');
    }
}
