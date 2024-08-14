<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(9);
        return view('welcome',[
            'posts' => $posts,
        ]);
    }

    public function store(PostRequest $request){
        $post = new Post;
        $post->text = $request->contents;
        $post->user_id = $request->user()->id;
        $post->save();
        return back();
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $post = Post::findOrFail($id);
        if (\Auth::id() === $post->user_id) {
            $data = [
                'user' => $user,
                'post' => $post
            ];
            return view('post.edit', $data);
        };
        abort(404);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->text = $request->contents;
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('/');
    }
}
