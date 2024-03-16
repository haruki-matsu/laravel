<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="{{ asset('js/login.js') }}"></script>

</head>
<body>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<main>
  <form method="post" action="{{route('login')}}">
    @csrf
    <h1>ログイン</h1>

    <div class="form-floating">
      <input type="email" name=email class="form-control"  placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name=password class="form-control"  placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button type="submit">Sign in</button>
  </form>
</main>

<!-- フッター -->
@include('components.footer')

</body>
</html>