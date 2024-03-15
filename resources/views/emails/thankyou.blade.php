<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせありがとうございます</title>
</head>
<body>
    <h1>お問い合わせありがとうございます</h1>

    <p>以下の内容でお問い合わせを受け付けました。</p>

    <hr>

    <p><strong>名前：</strong> {{ $data['name'] ?? '未入力' }}</p>
    <p><strong>メールアドレス：</strong> {{ $data['email'] ?? '未入力' }}</p>
    <p><strong>お問い合わせ分類：</strong> {{ $data['category'] ?? '未入力' }}</p>
    <p><strong>メッセージ：</strong><br>{{ nl2br(e($data['message'] ?? '未入力')) }}</p>

    <hr>

    <p>このメールは自動送信されています。ご返信いただいてもお答えできない場合がありますので、ご了承ください。</p>
    <p>何か他にご不明点等ございましたら、直接メールにてお問い合わせください。</p>
</body>
