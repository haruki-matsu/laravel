<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" >
    <title>ログイン画面</title>
</head>
<body>

  <!-- ヘッダー -->
  @include('components.header')

  <!-- 入力フォームのエラーを表示 -->
  @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- タイムアウト時のメッセージを表示 -->
  @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
  @endif

  <main>
    <form method="post" action="{{route('login')}}">
      @csrf
      <h1>ログイン</h1>
        <div class="form-floating">
          <label>Usename</label>
          <input type="text" name=user_name class="form-control" >
        </div>
        <div class="form-floating">
          <label for="floatingPassword">Password</label>
          <input type="password" name=password class="form-control">
        </div>
        <button type="submit">Sign in</button>
    </form>
  </main>

  <!-- フッター -->
  @include('components.footer')

</body>
</html>