$(document).ready(function() {
    $('#up_img').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('#savedImage').hide(); 
            $('#preview').attr('src', e.target.result).show(); 
        };
        
        if (file) {
            reader.readAsDataURL(file);
        } else {
            $('#preview').hide(); 
            $('#savedImage').show(); 
        }
    });
});

