//funkcja zamykająca i otwierająca menu mobilne
(function ($) {
        var toggleButton = $('.menu-toggle-button');
        toggleButton.click(function (e) {
            $(this).toggleClass('toggled'); //zbędne?
            $('#site-navigation-mobile').toggleClass('open');
            e.preventDefault();
        });
        $('.menu-kafelki-container ul li').hover(function () {
            $(this).addClass('toggled');
        }, function () {
            $(this).removeClass('toggled');
        });

//przenieść funkcję do oddzielnego pliku | sticky sidebar    
function sticky_relocate() {  
    var window_top = $(window).scrollTop();  
    var div_top = $('.widget-area__anchor').offset().top;  
    if (window_top > div_top) {  
        $('.widget-wrapper').addClass('sticky');  
    } else {  
        $('.widget-wrapper').removeClass('sticky');  
    }  
}
    $(window).scroll(sticky_relocate);  
    //na wypadek odświeżenia przeglądarki
    sticky_relocate(); 
    
// __________________________wrapper function end    
})(jQuery);