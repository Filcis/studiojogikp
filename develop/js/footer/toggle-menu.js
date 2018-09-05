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
})(jQuery);
