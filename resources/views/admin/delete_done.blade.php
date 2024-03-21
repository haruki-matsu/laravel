<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <title>削除完了画面</title>
</head>
<body>
    <!-- ヘッダー -->
    @include('components.header')

    <h2 class=h2>削除画面</h2>
        <div class=service_text>


            <!-- バリデーションのメッセージ -->
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif
        </div>

        <a href="/manage" class=service_button>管理画面に戻る</a> 

    <!-- フッター -->
    @include('components.footer')

</body>
</html>