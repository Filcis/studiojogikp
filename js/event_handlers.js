/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

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
