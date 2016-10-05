(function ($) {
    var toggleButton = $('.menu-toggle-button');
    toggleButton.click(function () {
        $('.secondary-nav-wrapper').slideToggle();
    });
})(jQuery);