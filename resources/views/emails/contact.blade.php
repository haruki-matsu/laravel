<!-- お客様に送るメール内容 -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様からのお問い合わせ</title>
</head>
<body>
<h1>お客様からのお問い合わせ</h1>
    <hr>
    <p><strong>名前：</strong> {{ $data['name'] ?? '未入力' }}</p>
    <p><strong>メールアドレス：</strong> {{ $data['email'] ?? '未入力' }}</p>
    <p><strong>お問い合わせ分類：</strong> {{ $data['category'] ?? '未入力' }}</p>
    <p><strong>メッセージ：</strong><br>{{ nl2br(e($data['message'] ?? '未入力')) }}</p>
    <hr>
</body>

