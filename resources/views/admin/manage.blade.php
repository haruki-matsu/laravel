<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>管理画面</title>
</head>
<body>

    <!-- ヘッダー -->
    @include('components.header_manage')


    <!-- サービスの登録セクション -->
    <section>
        <h2>新規登録</h2>
        <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="manage_table">
                <tr>
                    <th width="15%">ラインナップ</th>
                    <th width="30%">サービス内容</th>
                    <th width="15%">金額（税込）</th>
                    <th width="15%">
                        <input type="file" name="up_img" id="up_img" style="display:none;" onchange="previewFile()">
                        <label for="up_img" class="upload_btn">アップロード
                    </th>
                    <th width="10%"></th>
                </tr>
                <tr>
                    <td><input class="grayBack_thin" type="text" name="line_up"></td>
                    <td><textarea class="grayBack_thick" name="service_contents"></textarea></td>
                    <td><input class="grayBack_thin" type="number" name="price"></td>
                    <td>
                        <span id="exist_img">画像表示</span>
                        <img id="update_img" src="" alt="プレビュー" style="width: 100px; display: none;">
                    </td>
                    <td><button type="submit" class="grayBack_botton">登録</button></td>
                </tr>
            </table>
        </form>
    </section>

    <!-- 登録サービスの表示のセクション  -->
    <section>
        <h2>データ管理</h2>
        <table class="manage_table">
            <tr>
                <th width="15%">ラインナップ</th>
                <th width="30%">サービス内容</th>
                <th width="15%">金額（税込）</th>
                <th width="15%"></th>
                <th width="5%"></th>
                <th width="5%"></th>
            </tr>

            @foreach ($services as $service)
            <tr>
                <td><p>{{ $service->line_up }}</p></td>
                <td><p>{{ $service->service_name }}</p></td>
                <td><p>¥{{ number_format($service->price) }}</p></td>
                <td><img src="{{ asset('storage/' . $service->img_path) }}" alt="" style="width: 100px;"></td>
                <td class="td_button"><a href="edit_item/{{ $service->id }}" class="grayBack_botton_edit">編集</a></td>
                <td class="td_button">
                    <form action="{{ route('delete', $service->id) }}" method="POST" onsubmit="return confirm('削除しても良いですか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="grayBack_botton_edit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>

    <!-- フッター -->
    @include('components.footer')

    <script src="{{ asset('js/img_swich.js') }}"></script>

</body>
</html>

