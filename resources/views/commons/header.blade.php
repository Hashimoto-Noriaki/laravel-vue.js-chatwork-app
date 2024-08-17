<header class="mb-5">
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
            <a class="navbar-brand" href="/">Chat Work</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container navbar-container collapse navbar-collapse" id="nav-bar">
                @if (Auth::check())
                    <form method="get" action="{{ route('posts.index') }}" class="form-inline my-2 my-lg-0 mr-auto　w-50">
                        <div class="input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" name="keyword" class="form-control" placeholder="メッセージ内容を検索" value="{{ request()->input('keyword') }}" autocomplete="on" w-100　>
                        </div>
                    </form>
                @endif
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <li class="nav-item"><a href="{{ route('users.show', Auth::id()) }}" class="nav-link">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">ログアウト</a></li>
                        <li class="nav-item"><a href="" class="nav-link">マイページ</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                        <li class="nav-item"><a href="{{ route('signup') }}" class="nav-link">新規登録</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
