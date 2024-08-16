<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show',$user->id) }}" class="nav-link {{ Request::is('users/'.$user->id) ? 'active' : '' }}">タイムライン</a></li>
    <li class="nav-item"><a href="{{ route('followings',$user->id) }}" class="nav-link">フォロー中<br><div class="badge badge-secondary">{{ $countfollowings }}</div></a></li>
    <li class="nav-item"><a href="{{ route('followers',$user->id) }}" class="nav-link">フォロワー<br></a><div class="badge badge-secondary">{{ $countfollowers}}</div></li>
</ul>
@include('post.post', ['posts' => $posts])
