<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends Controller
{
    public function store(PostRequest $request){
        $post = new Post;
        $post->text = $request->contents;
        $post->user_id = $request->user()->id;
        $post->save();
        return back();
    }
}
