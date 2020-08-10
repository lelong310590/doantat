'use strict';

jQuery(document).ready(($) => {

    let body = $('body');
    let popupBackdrop = $('.popup-backdrop');
    let popupContent = $('.popup-content');

    body.on('click', '.popup-content-close a', function () {
        popupBackdrop.hide();
        popupContent.hide();
    })

    body.on('click', '.register-button a', function () {
        let target = $(this).attr('data-target');
        popupBackdrop.css('display', 'flex');
        $('#' + target).show();
    })


    body.keyup(function(e) {
        if (e.key === "Escape") { // escape key maps to keycode `27`
            // <DO YOUR WORK HERE>
            popupBackdrop.hide();
            popupContent.hide();
        }
    });

    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname
            ) {

                // Disable menu anchor text on mobile
                if ($(window).width() <= 768) {
                    $('.main-menu-backdrop').hide();
                    $('.main-menu').hide();
                }

                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(':focus')) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                    });
                }
            }
        });
});
