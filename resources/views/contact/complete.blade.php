<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <title>送信完了画面</title>
</head>
<body>
    <!-- ヘッダー -->
    @include('components.header')

    <!-- 送信結果表示セクション -->
    <h2 class="mail_h2">送信完了</h2>

        <!-- 送信が完了した場合 -->
        @if (session('success')) 
            <p class="mail_p">お問合せいただきありがとうございます。<br>担当者より追ってご連絡いたします。</p>
        <!-- 送信が失敗した場合（データの取得の失敗） -->
        @elseif (session('error_dataNull'))
            <p class="mail_p"> {{ session('error_dataNull') }}<br>もう一度お試しいただくか、直接お問い合わせください。</p>
        <!-- 送信が失敗した場合（二重送信） -->
        @elseif (session('error_doubleSend'))
            <p class="mail_p">  {{ session('error_doubleSend') }}</p>
        <!-- 送信が失敗した場合（メール送信の失敗） -->
        @elseif (session('error_send'))
            <p class="mail_p"> {{ session('error_send') }}<br>もう一度お試しいただくか、直接お問い合わせください。</p>
        @endif

        <a href="/" class="mail_button">ホーム画面に戻る</a> 
    
    <!-- フッター -->
    @include('components.footer')

</body>
</html>



 


