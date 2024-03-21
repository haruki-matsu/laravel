<!-- 管理ページ専用のヘッダー -->

<header>
    <a href="/">
        <img src="{{ asset('images/icon.png') }}" alt="スクトップPCのアイコン" style="cursor: pointer;">
    </a>
    <form action="{{ route('logout') }}" method="POST" >
        @csrf
        <button type="submit" class="login_botton" id="button_right">ログアウト</button>
    </form>
</header>


