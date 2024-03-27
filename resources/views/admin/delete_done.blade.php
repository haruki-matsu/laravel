<!-- ヘッド -->
@include('components.head', ['title' => '削除完了画面'])

<!-- ヘッダー -->
@include('components.header_common')

<!-- ボディ -->
    <h2 class=serviceh2>削除画面</h2>
        <div class=service_p>

            <!-- バリデーションのメッセージ -->
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif
        </div>

        <div class=service_button_container>
            <a href="/manage" class=service_button>管理画面に戻る</a> 
        </div>
<!-- フッター -->
@include('components.footer')

