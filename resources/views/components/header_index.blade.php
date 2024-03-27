<!-- indexページ専用のヘッダー -->
<body>

<header> 
    <!-- PCアイコン -->
    <div class=header_left>
        <a href="/"><img src="{{ asset('images/icon.png') }}" alt="スクトップPCのアイコン" style="cursor: pointer;"></a>
    </div>

    <!-- メニュー -->
    <div class=header_right>
        <nav>
            <ul>
                <li><a href="#service" class="scroll_link">サービス一覧</a><li>
                <li><a href="#form" class="scroll_link">お問い合わせ</a><li>
            </ul>
        </nav>

    <!-- ハンバーガーメニューアイコン(リスポンシブ時)-->
            <div class="hamburger_icon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div> 
            </div>
    <!-- メニュー内容(リスポンシブ時) -->
            <div class="hamburger_menu" id="hamburger_menu">
                <a href="#service" class="scroll_link">サービス一覧</a>
                <a href="#form" class="scroll_link">お問い合わせ</a>
            </div>

    <!-- ログインボタン -->
        <a href="{{ route('showLogin') }}" class="login_botton">ログイン</a>
    </div>
</header>

<dody>



