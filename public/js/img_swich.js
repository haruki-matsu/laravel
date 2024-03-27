$(document).ready(function() {
    $('#up_img').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('#exist_img').hide(); 
            $('#update_img').attr('src', e.target.result).show(); 
        };
        
        if (file) {
            reader.readAsDataURL(file);
        } else {
            $('#exsit_img').hide(); 
            $('#update_img').show(); 
        }
    });
});

