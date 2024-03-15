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




<!-- サービスの登録セクション -->
<section id="service">
    <h2 class="manage_h2">編集画面</h2>
    <form action="{{ route('update', ['id' => $service->id]) }}"  method="post" enctype="multipart/form-data">
        @csrf
        <table class="table_manage">
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
                <td><input class="input_gray" type="text" name="line_up"value="{{ $service->line_up }}"></td>
                <td><textarea class="input_gray2" name="service_contents">{{ $service->service_name }}</textarea></td>
                <td><input class="input_gray" type="number" name="price" value="{{ $service->price }}"></td>
                <td>
                    <img src="{{ asset('storage/' . $service->img_path) }}" alt="サービス画像" id="savedImage" style="max-width: 100px; max-height: 100px;">
                    <img id="preview" src="" alt="プレビュー" style="width: 100px; display: none;">
                    
   
                </td>
                <td><button type="submit" class="input_gray3">更新</button></td>
            </tr>
        </table>
    </form>
</section>
    
    <!-- フッター -->
@include('components.footer')

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>