<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('keyword');
        $query = Post::query();

        if (!empty($search)) {
            $query->where('text', 'LIKE', "%{$search}%");
        }

        $posts = $query->orderBy('id', 'desc')->paginate(10);

        // 検索結果が空の場合にフラッシュメッセージを設定
        if ($posts->isEmpty() && !empty($search)) {
            session()->flash('alertMessage', '検索が見つかりません。');
        }

        return view('welcome', ['posts' => $posts, 'search' => $search]);
    }

    public function store(PostRequest $request){
        $post = new Post;
        $post->text = $request->contents;
        $post->user_id = $request->user()->id;
        $post->save();
        return back()->with('successMessage','投稿しました。');
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
        return redirect('')->with('successMessage','更新しました。');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(\Auth::id() === $post->user_id){
            $post->delete();
        }
        return back()->with('alertMessage','投稿を削除しました。');
    }
}
