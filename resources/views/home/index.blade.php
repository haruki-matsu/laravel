<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <title>ホーム画面</title>
</head>
<body>
    <!-- ヘッダー -->
    @include('components.header_index')

    <!-- エラーメッセージ(入力フォームでエラーになった場合に表示) -->
    @if ($errors->any())
    <p class="form_error">入力内容に誤りがあります</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>・{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- ヘッダー下背景(windowsとmacのロゴ)-->
    <img src="{{ asset('images/image 1.png') }}" alt="ヘッダー下の背景画像(windowsとmacのロゴ)" id=img_wiondosMac>

    <!-- サービス一覧表示セクション -->
    <section class=service_section id=service>
        <h1>テクノロジーを身近に</h1>
            <h2>サービス一覧</h2>
                <table>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 45%;">
                        <col style="width: 20%;">
                        <col style="width: 20%;">
                    </colgroup>
                        <tr>
                            <th>ラインナップ</th>
                            <th>サービス内容</th>
                            <th>金額（税込）</th>
                            <th></th>
                        </tr>
                    @foreach ($services as $service) 
                        <tr>
                            <td><p>{{ $service->line_up }}</p></td>
                            <td><p>{{ $service->service_name }}</p></td>
                            <td><p>¥{{ number_format($service->price) }}</p></td>
                            <td><img src="{{ asset('storage/' . $service->img_path) }}" alt="" style="width: 100px;"></td>

                        </tr>
                    @endforeach

                </table>
    </section>

    <!-- 入力フォームのセクション -->
    <section class="form_section" id=form>
        <h2 class="form_h2">お問合せ</h2>
        </ul>
            <form action="confirm" method="post">
            @csrf
                <div class=form_top>
                    <div class="input_group">
                        <label for="name">氏名（必須）</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="input_group">
                        <label for="email">メールアドレス(必須)</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input_group">
                        <label for="confirm_email">アドレス再入力(必須)</label>
                        <input type="email" id="confirm_email" name="confirm_email" required>
                    </div>
                    <div class="input_group">
                        <label for="category">お問い合せ分類(必須)</label>
                        <select id="category" name="category" required>
                            <option value="" id=first_select>適切な種類を選択してください</option>
                            <option value="product">サービスについて</option>
                            <option value="service">商品について</option>
                            <option value="other">その他</option>
                        </select> 
                    </div>
                    <div class="input_group">
                        <label for="message">お問い合わせ内容</label>
                        <textarea id="message" name="message"  required></textarea>
                    </div>
                </div>
                <input type="submit" value="送信" class="form_botton">
            </form>
    </section>

    <section class="white_section"></section>

    <!-- フッター -->
    @include('components.footer')

</body>
</html>