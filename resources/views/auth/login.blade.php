<!-- ヘッド -->
@include('components.head', ['title' => 'ログイン画面'])

<!-- ヘッダー -->
@include('components.header_common')

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
