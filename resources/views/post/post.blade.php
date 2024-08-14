<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="mb-3 text-center">
            <div class="text-left d-inline-block w-75 mb-2">
                <img class="mr-2 rounded-circle" src="{{ Gravatar::get($post->user->email, ['size' => 55]) }}" alt="ユーザのアバター画像">
                <p class="mt-3 mb-0 d-inline-block"><a href="">{{$post->user->name}}</a></p>
            </div>
            <div class="">
                <div class="text-left d-inline-block w-75">
                    <p class="mb-2">{{$post->text}}</p>
                    <p class="text-muted">{{$post->created_at}}</p>
                </div>
                @if (Auth::id() === $post->user_id)
                    <div class="d-flex justify-content-between w-75 pb-3 m-auto">
                        <!-- 削除ボタンにモーダルをトリガーさせる -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $post->id }}">削除</button>
                        <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">編集する</a>
                    </div>
                @endif
            </div>
        </li>

        <!-- モーダルの設定 -->
        <div class="modal fade" id="delete-modal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label-{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">確認</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <label>本当に削除しますか？</label>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" id="delete-button" class="btn btn-danger">削除する</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</ul>

<div class="m-auto" style="width: fit-content">{{ $posts->links('pagination::bootstrap-4') }}</div>
