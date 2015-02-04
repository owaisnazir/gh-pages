( function( window, $, undefined ) {
'use strict';

    // Mobile Menu Toggle
    $('.global-nav .toggle').click(function(e){
        $('.global-nav').toggleClass('active');
        e.preventDefault();
    });

    // Sidebar Accordions
    $('.accordion-toggle').click(function() {
        $('.accordion-toggle').removeClass('open');
        $('.accordion-content').slideUp('fast');
        if($(this).next().is(':hidden') === true) {
            $(this).addClass('open');
            $(this).next().slideDown('fast');
        }
        return false;
    });

    // Home Slideshow
    $('.slideshow').flexslider({
        animation: 'slide',
        prevText: '',
        nextText: '',
        pauseOnHover: true
    });

})( this, jQuery );
