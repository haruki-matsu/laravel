<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/login.js') }}"></script>

</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="form-signin w-100 m-auto">
  <form method="post" action="{{route('login')}}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">ログイン</h1>

    <div class="form-floating">
      <input type="email" name=email class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name=password class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>
