<!-- ヘッド -->
@include('components.head', ['title' => '確認画面'])

    <!-- ヘッダー -->
    @include('components.header_common')

    <!--送信内容の確認のセクション -->
    <h2 class="mail_h2">送信内容の確認</h2>
        <form action="send" method="post">
            @csrf
            <div class=mail_p>
                <p>名前: {{ session('data.name') }}</p>
                <p>メールアドレス: {{ session('data.email') }}</p>
                <p>カテゴリー: {{ session('data.category') }}</p>
                <p>メッセージ: {{ session('data.message') }}</p>
            </div>

        <!-- データ送信のための隠しフィールド -->
            <input type="hidden" name="name" value="{{ session('data.name') }}">
            <input type="hidden" name="email" value="{{ session('data.email') }}">
            <input type="hidden" name="category" value="{{ session('data.category') }}">
            <input type="hidden" name="message" value="{{ session('data.message') }}">
            
            <div class=mail_buttons>
                <button type="button" class=mail_button id=mailEdit_button onclick="history.back()">修正する</button>
                <input type="submit"  class=mail_button id=mailSubmit_button value="送信する">
            </div>
        </form>

<!-- フッター -->
@include('components.footer')




