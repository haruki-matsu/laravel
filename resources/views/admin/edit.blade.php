<!-- ヘッド -->
@include('components.head', ['title' => '編集画面'])

<!-- ヘッダー -->
@include('components.header_common')

<!-- ボディ -->

    <!-- サービスの登録セクション -->
    <section id="service">
        <h2 class="manage_h2">編集画面</h2>
            <form action="{{ route('update', ['id' => $service->id]) }}"  method="post" enctype="multipart/form-data">
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
                        <td data-label=ラインナップ><input class="grayBack_thin" type="text" name="line_up"value="{{ $service->line_up }}"></td>
                        <td data-label=サービス内容><textarea class="grayBack_thick" name="service_contents">{{ $service->service_name }}</textarea></td>
                        <td data-label=金額(税込み)>
                            <input class="grayBack_thin" type="number" name="price" value="{{ $service->price }}" min="0"></td>
                        <td data-label=画像>
                            <img src="{{ asset('storage/' . $service->img_path) }}" alt="サービス画像" id="exist_img" style="max-width: 100px; max-height: 100px;">
                            <img id="update_img" src="" alt="プレビュー" style="width: 100px; display: none;">
                        </td>
                        <td><button type="submit"  class="grayBack_botton">更新</button></td>
                    </tr>
                </table>
            </form>
    </section>
    
<!-- フッター -->
@include('components.footer')
    
    <!-- JSファイル -->
    @section('before-closing-body')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/img_swich.js') }}"></script>
