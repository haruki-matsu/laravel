<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <title>入力フォーム確認画面</title>
</head>
<body>
    <!-- ヘッダー -->
    @include('components.header')

    <!--送信内容の確認のセクション -->
    <h2 class="mail_h2">送信内容の確認</h2>
        <form action="send" method="post">
            @csrf
            <div class=mail_p>
                <p>名前: {{ session('data.name') }}</p>
                <p>メールアドレス: {{ session('data.email') }}</p>
                <p>カテゴリー: {{ session('data.category') }}</p>
                <p>メッセージ: {{ session('data.message') }}</p>
            </div>

        <!-- データ送信のための隠しフィールド -->
            <input type="hidden" name="name" value="{{ session('data.name') }}">
            <input type="hidden" name="email" value="{{ session('data.email') }}">
            <input type="hidden" name="category" value="{{ session('data.category') }}">
            <input type="hidden" name="message" value="{{ session('data.message') }}">
            
            <button type="button" class=mail_button onclick="history.back()">修正する</button>
            <input type="submit"  class=mail_button value="送信する">
        </form>

    <!-- フッター -->
    @include('components.footer')

</body>
</html>


