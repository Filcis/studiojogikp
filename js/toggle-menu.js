(function ($) {
    var toggleButton = $('.menu-toggle-button');
    toggleButton.click(function () {
        $('.menu-tiles').slideToggle();
    });
})(jQuery);