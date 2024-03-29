'use strict';

function checkIfDuplicateExists(w){
    return new Set(w).size !== w.length
}

function numberWithCommas(x) {

    return x.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function checkInputHasLetter (inputtxt)  {
    return !!(inputtxt.match(/[a-zA-Z]+/g));
}


Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

String.prototype.replaceAt = function(index, replacement) {
    if (index >= this.length) {
        return this.valueOf();
    }

    var chars = this.split('');
    chars[index] = replacement;
    return chars.join('');
}

jQuery(document).ready(($) => {

    const body = $('body');
    const popupBackdrop = $('.popup-backdrop');
    const popupContent = $('.popup-content');
    const ticketPopup = $('#buy-ticket-popup');
    const ticketResult = $('#buy-ticket-result');

    function getdate() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        if(s<10){
            s = "0"+s;
        }
        $('#timer').text(h+" : "+m+" : "+s);
        setTimeout(function( ){
            getdate();
        }, 500);
    }

    getdate();

    body.on('click', '.popup-content-close, #reject-buy-ticket', function () {
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
        if ($(this).hasClass('ticket-item-result')) {
            return false;
        }
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
        let ticketValue = $('.tickets-value[disabled]');
        let maxTicket = parseInt($('input[name=limitTicket]').val());
        let popupContentInner = ticketPopup.children('.popup-content-inner');
        let html = '';
        let popupContentResultElemWrapepr = ticketResult.find('.ticket-wrapper');
        let logo = $('.site-logo').attr('src');
        let pricePerTicket = $('#price_per_ticket').val();
        let totalPriceOutput = $('#total-price');

        popupContentInner.empty();

        if (ticketValue.length === maxTicket) {
            popupContentInner.html('Chọn ít nhất một vé để đặt mua !');
            popupBackdrop.css('display', 'flex');
            ticketPopup.show();
            return false;
        }

        popupContentResultElemWrapepr.html();

        let selectedTicket = $('.tickets-value[type=hidden]:not([disabled])');
        selectedTicket.each(function() {
            html += '<div class="ticket-item dir-column ticket-item-result w-130 h-200 d-flex justify-center align-center pa-5 ml-5 mr-5">\n' +
                '         <img src="' + logo + '" alt="" class="img-responsive">\n' +
                '         <div class="ticket-number-wrapper d-flex justify-center mt-20">\n' +
                '         \n' + '<span>' + $(this).val() + '</span>\n' +
                '         </div>\n' +
                '    </div>'
        })

        let totalPrice = pricePerTicket * selectedTicket.length
        //console.log('totalPrice:', totalPrice);


        // checkIfDuplicateExists(seletecTicketArray);

        popupBackdrop.css('display', 'flex');
        ticketResult.show()


        popupContentResultElemWrapepr.html(html);
        totalPriceOutput.html(totalPrice.format());
    })

    body.on('click', '#confirm-buy-ticket', function (e) {
        $('#form-buy-ticket').submit();
    })

    body.on('keyup', 'input[name=bank_holder]', function () {
        let value = $(this).val();
        $(this).val(value.toUpperCase());
    });

    body.on('keyup', 'input#amount_withdrawal', function (e) {
        let valIput = e.target.value.replace(/[,]/g, '');
        let max = $(this).attr('data-max');
        // console.log('valIput :', valIput);
        // console.log('check :', checkInputHasLetter(valIput));
        if (checkInputHasLetter(valIput)) {
            $(this).val(0);
        } else {
            if (parseInt(valIput) >= parseInt(max)) {
                $(this).val(numberWithCommas(max));
            } else if (parseInt(valIput) >= 100000000) {
                $(this).val(numberWithCommas('100000000'));
            } else {
                $(this).val(numberWithCommas(valIput));
            }
        }
    });

    body.on('click', '.withdraw-expand', function (e) {
        console.log($(this).parent().next());
        $(this).parent().next().slideToggle();
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
