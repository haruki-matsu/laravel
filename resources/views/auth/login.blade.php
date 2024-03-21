<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <title>ログイン画面</title>
</head>
<body>

  <!-- ヘッダー -->
  @include('components.header')

  <!-- 入力フォームのエラーを表示 -->
  @if ($errors->any())
    <p class="form_error">入力エラー<p>
      <ul>
        @foreach ($errors->all() as $error)
          <li>・{{ $error }}</li>
        @endforeach
      </ul>
  @endif

 
  <form method="post" action="{{route('login')}}" >
  @csrf
    <h2 class=login_h2>ログイン画面</h2>
      <div class="login_container">
        <table>
          <tr>
            <th>UserName</th>
              <td><input type="text" name="user_name"></td>
            </tr>
            <tr>
              <th>PassWord</th>
              <td><input type="password" name="password"></td>
            </tr>
          </table>
        <button type="submit">ログイン</button>
      </div>



  <!-- フッター -->
  @include('components.footer')

</body>
</html>