<header>
    <h1 class="text-red-600"><a href="{{ \Auth::check() ? route('home') : route('top') }}">{{ config('app.name') }}</a></h1>
    <ul>
        @auth
        <li><a href="{{ route('feedback') }}">フィードバックを送る</a></li>
        <li><a href="{{ route('logout') }}">ログアウトする</a></li>
        @endauth
        @guest
        <li><a href="{{ route('login') }}">ログインする</a></li>
        <li><a href="{{ route('register') }}">会員登録する</a></li>
        @endguest
    </ul>
</header>