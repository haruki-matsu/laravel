$(document).ready(function() {
    $('#up_img').change(function() {
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
            $('#preview').show();
        };
        
        if (file) {
            reader.readAsDataURL(file);
        } else {
            $('#preview').hide();
        }
    });
});




