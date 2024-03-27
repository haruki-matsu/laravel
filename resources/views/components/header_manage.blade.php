<!-- 管理ページ専用のヘッダー -->
<header>
    <div class=header_left>
        <a href="/"><img src="{{ asset('images/icon.png') }}" alt="スクトップPCのアイコン" style="cursor: pointer;"></a>
    </div>
    <div class=header_right>
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <button type="submit" class="login_botton" >ログアウト</button>
        </form>
    </div>
</header>

<dody>


