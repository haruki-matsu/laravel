$(document).ready(function(){
    $('.scroll-link').click(function(e) {
        e.preventDefault();
  
        var targetId = $(this).attr('href');
        var targetPosition = $(targetId).offset().top;
        
        $('html, body').animate({
            scrollTop: targetPosition
        }, 1000); // ms
    });
});