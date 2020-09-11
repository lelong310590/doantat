'use strict';

jQuery(document).ready(($) => {

    String.prototype.replaceAt = function(index, replacement) {
        if (index >= this.length) {
            return this.valueOf();
        }

        var chars = this.split('');
        chars[index] = replacement;
        return chars.join('');
    }

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

    body.on('click', '.ticket-item', function (e) {
        let image = $(this).children('img');
        let faceUp = $(this).children('.ticket-face-up-wrapper');
        let ticketNumber = $(this).attr('data-ticket-number');
        let ticketNumberElem = $('#'+ticketNumber);
        ticketNumberElem.removeAttr('disabled');
        image.hide();
        faceUp.addClass('active');
    });

    body.on('click', '.ticket-facedown', function (e) {
        e.stopPropagation();
        let parent = $(this).parents('.ticket-face-up-wrapper');
        let image = parent.prev();
        let ticketNumberElem = image.prev();
        image.show()
        parent.removeClass('active');
        ticketNumberElem.attr('disabled', 'disabled')
    });

    body.on('change', '.ticket-number-input', function (e) {
        let position = $(this).attr('data-position');
        let target = $(this).attr('data-target');
        let targetElem = $('#'+target);
        let targetValue = targetElem.val();
        let value = $(this).val();

        let newValue = targetValue.replaceAt(parseInt(position), value);
        targetElem.val(newValue);
    });

    body.on('click', '#form-buy-ticket button', function (e) {
        e.preventDefault();
    })

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
