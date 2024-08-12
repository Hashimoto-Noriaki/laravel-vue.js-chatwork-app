@extends('layouts.app')
@section('content')

<div class="center jumbotron bg-danger ">
    <div class="text-center text-white mt-2 pt-1">
        <h1><i class="fas fa-comment-dots pr-3 d-inline"></i>ChatApp</h1>
    </div>
</div>
<h5 class="description text-center">チャットで会話をしましょう</h5>
@if (Auth::check())
    <div class="w-75 m-auto">@include('commons.error_messages')</div>
    <div class="text-center mb-3-">
        <form method="post" action="{{ route('posts.store') }}" class="d-inline-block w-75">
        @csrf
            <div class="form-group">
                <textarea class="form-control" name="contents" rows="2">{{ old('contents') }}</textarea>
                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-success">投稿する</button>
                </div>
            </div>
        </form>
    </div>
@endif
@endsection
