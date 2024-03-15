function previewFile() {
    const preview = document.getElementById('preview');
    const file = document.getElementById('up_img').files[0];
    const reader = new FileReader();
    const savedImage = document.getElementById('savedImage'); // 既存の画像要素

    reader.addEventListener("load", function () {
        preview.src = reader.result;
        preview.style.display = 'block'; // プレビュー画像を表示
        if (savedImage) savedImage.style.display = 'none'; // 既存の画像を非表示に
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

