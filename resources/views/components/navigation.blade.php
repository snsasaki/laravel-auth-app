<nav>
    @auth
        <p>こんにちは、{{ auth()->user()->name }} さん</p>

        <a href="{{ route('dashboard') }}">ダッシュボード</a>
        {{-- TODO: 管理メニュー多分表示されていない --}}
            @can('view-admin-menu')
            <a href="/admin">管理メニュー</a>
            @endcan
        <a href="{{ route('mypage') }}">マイページ</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">ログアウト</button>
        </form>
    @else
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">新規登録</a>
    @endauth
</nav>