@extends('layouts.app')
@section('content')
<div class="center jumbotron bg-danger ">
    <div class="text-center text-white mt-2 pt-1">
        <h1><i class="fas fa-comment-dots pr-3 d-inline"></i>ChatApp</h1>
    </div>
</div>
@if (session('alertMessage'))
  <div class="alert alert-danger text-center w-100 mx-auto">
    {{ session('alertMessage') }}
  </div>
@elseif (session('successMessage'))
<div class="alert alert-success text-center w-100 mx-auto">
  {{ session('successMessage') }}
</div>
@endif
<h5 class="description text-center">チャットで会話をしましょう</h5>
    @if (Auth::check())
        <form method="post" action="{{ route('posts.store') }}" class="d-inline-block w-100">
        @csrf
            <div class="form-group">
                <textarea class="form-control" name="contents" rows="2">{{ old('contents') }}</textarea>
                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-success">投稿する</button>
                </div>
            </div>
        </form>
    @endif
</div>

@include('post.post',['posts' => $posts])
@endsection
