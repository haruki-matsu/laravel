<!-- ヘッド -->
@include('components.head', ['title' => '管理画面'])
    
<!-- ヘッダー -->
@include('components.header_manage')

<!-- ボディ -->

    <!-- サービスの登録セクション -->
    <section>
        <h2>新規登録</h2>
        <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="manage_table">
                <tr class="thead">
                    <th width="15%">ラインナップ</th>
                    <th width="30%">サービス内容</th>
                    <th width="15%">金額（税込）</th>
                    <th width="15%">
                        <input type="file" name="up_img" id="up_img" style="display:none;" onchange="previewFile()">
                        <label for="up_img" class="upload_btn">アップロード
                    </th>
                    <th width="5%"></th>
                </tr>
                <tr>
                    <td data-label=ラインナップ><input class="grayBack_thin" type="text" name="line_up"></td>
                    <td data-label=サービス内容><textarea class="grayBack_thick" name="service_contents"></textarea></td>
                    <td data-label=金額(税込)><input class="grayBack_thin" type="number" name="price" min="0"></td>
                    <td data-label=画像>
                        <div class=upload_button_responsive>
                            <input type="file" name="up_img_responsive" id="up_img_responsive" style="display:none;" onchange="previewFile()">
                            <label for="up_img" class="upload_btn">アップロード</label>
                        </div>
                        <div>
                            <div id="exist_img">＊こちらに画像が<br>表示されます</div>
                            <img id="update_img" src="" alt="プレビュー" style="width: 100px; display: none;">
                        </div>
                        </td>
                    <td class=td_button><button type="submit" class="grayBack_botton">登録</button></td>
                </tr>
            </table>
        </form>
    </section>

    <!-- 登録サービスの表示のセクション  -->
    <section>
        <h2>データ管理</h2>
        <table class="manage_table">
            <tr class="thead">
                <th width="15%">ラインナップ</th>
                <th width="30%">サービス内容</th>
                <th width="15%">金額（税込）</th>
                <th width="15%"></th>
                <th width="5%"></th>
                <th width="5%"></th>
            </tr>

            @foreach ($services as $service)
            <tr>
                <td class=td_top><p>{{ $service->line_up }}</p></td>
                <td data-label=サービス内容><p class=service_content>{{ $service->service_name }}</p></td>
                <td data-label=金額（税込）><p>¥{{ number_format($service->price) }}</p></td>
                <td data-label=画像><img src="{{ asset('storage/' . $service->img_path) }}" alt="" style="width: 100px;"></td>
                <td class="td_button">
                    <button onclick="location.href='edit_item/{{ $service->id }}'" class="grayBack_botton_edit">編集</button>
                </td>
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

    <!-- JSファイル -->
    @section('before-closing-body')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/img_swich.js') }}"></script>


