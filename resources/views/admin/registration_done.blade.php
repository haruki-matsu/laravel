<!-- ヘッド -->
@include('components.head', ['title' => '登録完了画面'])

<!-- ヘッダー -->
@include('components.header_common')

<!-- ボディ -->

    <!-- 登録画面のセクション -->
    <h2 class=service_h2>登録画面</h2>
        <div class=service_p>

            <!-- バリデーションのメッセージ -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class=service_button_container>
            <a href="/manage" class=service_button>管理画面に戻る</a> 
        <div>

<!-- フッター -->
@include('components.footer')

