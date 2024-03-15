<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <title>Document</title>
</head>
<body>

<!-- ヘッダー -->
@include('components.header')


<!-- 登録画面のセクション -->
    <h2 class=f_h2>登録画面</h2>
    <div class=f_text>

<!-- バリデーションのメッセージ -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
    
<a href="/manage" class=f_button>管理画面に戻る</a> 

    <!-- フッター -->
@include('components.footer')

</body>
</html>