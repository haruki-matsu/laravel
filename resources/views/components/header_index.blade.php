<!-- indexページ専用のヘッダー -->

<header> 
    <img src="{{ asset('images/icon.png') }}" alt="スクトップPCのアイコン">
    <nav>
            <a href="#service" class="scroll_link">サービス一覧</a>
            <a href="#form" class="scroll_link">お問い合わせ</a>
    </nav>
    <div>
<!-- ハンバーガーメニューアイコン -->
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <!-- メニュー内容 -->
        <div class="nav-menu" id="navMenu">
            <a href="#service" class="scroll_link">サービス一覧</a>
            <a href="#form" class="scroll_link">お問い合わせ</a>
        </div>
    </div>
    <a href="{{ route('showLogin') }}" class="login_botton">ログイン画面</a>
</header>


