@extends('layouts.app')
@section('content')

<div class="text-center mt-5">
    <div class="text-center">
        <h1><i class="fas fa-chalkboard-teacher pr-3 d-inline"></i>Chat App</h1>
        <div class="text-center mt-3">
            <h3 class="login_title text-left d-inline-block mt-10">新規登録する</h3>
        </div>
        <div class="row mt-50 mb-5">
            <div class="col-sm-4 offset-sm-4">
                <form method="POST" action="{{ route('signup.post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="例: 山田太郎(登録後に変更できます)">
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="6文字以上の半角英数字">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">パスワード確認</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="もう一度入力してください">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">新規登録</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
