
function previewFile() {
    const preview = document.getElementById('preview');
    const file = document.getElementById('up_img').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // ファイルの読み込みが成功したら、プレビューに画像を表示
        preview.src = reader.result;
        preview.style.display = 'block'; // 画像がある場合に表示
    }, false);

    if (file) {
        // ファイルの読み込みを実行
        reader.readAsDataURL(file);
    }
}

