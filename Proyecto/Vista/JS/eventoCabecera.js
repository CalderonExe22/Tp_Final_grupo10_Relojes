
$(document).ready(function() {
    var header = $('.transparent-header');
    var resultado 
    
    $(header).hover(function () {
        if($(header).hasClass("transparent-header transparent")){
            header.removeClass('transparent')
            resultado = true
            $(".links-menu").css({
                'color': 'black'
            });
            $(".logoHover").css({
                'color': 'black'
            });
        }else{
            resultado = false
        }
    }, function () {
           if(resultado){
                header.addClass('transparent')
                $(".links-menu").css({
                    "color":"white"
                });
                $(".logoHover").css({
                    'color': 'white'
                });
           }
        }
    );
    

    if ($(window).scrollTop() === 0) {
        header.addClass('transparent');
        $(".links-menu").css({
            'color': 'white'
        });
        $(".logoHover").css({
            'color': 'white'
        });
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() === 0) {
            header.addClass('transparent');
            $(".links-menu").css({
                'color': 'white'
            });
            $(".logoHover").css({
                'color': 'white'
            });
        } else {
            header.removeClass('transparent');
            $(".links-menu").css({
                'color': 'black'
            });
            $(".logoHover").css({
                'color': 'black'
            });
        }
    });
    
});