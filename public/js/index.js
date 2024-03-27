//スクロール

$(document).ready(function(){
    $('.scroll_link').click(function(e) {
        e.preventDefault();
  
        var targetId = $(this).attr('href');
        var targetPosition = $(targetId).offset().top;
        
        $('html, body').animate({
            scrollTop: targetPosition
        }, 1000); 
    });
});


//ハンバーガーメニュー

$(document).ready(function(){
    $(".hamburger_icon").click(function(){
        $("#hamburger_menu").toggleClass("visible");
    });
});
  

