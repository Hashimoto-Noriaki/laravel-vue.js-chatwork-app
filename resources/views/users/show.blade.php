@extends('layouts.app')
@section('content')
@if (session('alertMessage'))
  <div class="alert alert-danger text-center w-75 mx-auto">
    {{ session('alertMessage') }}
  </div>
@elseif (session('successMessage'))
  <div class="alert alert-success text-center w-75 mx-auto">
    {{ session('successMessage') }}
  </div>
@endif
<div class="row">
    <aside class="col-sm-4 mb-5">
        @include('commons.user_details_card', ['followUser' => $user])
        @include('users.follow_button', ['followUser' => $user])
    </aside>
    <div class="col-sm-8">
        @include('commons.user_details_tab', ['followUser' => $user])
        @include('post.post', ['posts' => $posts])
    </div>
</div>
<div class = "text-center mt-3">
    <p><a href = "{{ route('posts.index') }}">ホーム画面はこちら</a></p>
</div>
@endsection
