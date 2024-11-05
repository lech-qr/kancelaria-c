$(document).ready(function () {
    // Menu responsywne
    let header_h = $('body header').outerHeight();
    // console.log(header_h);

    let tmpMenu = 0;
    $('#icon-menu').click(function () {
        $(this).toggleClass("open");
        if (tmpMenu == 0) {
            $('body header').addClass('show');
            // Kontakt
            $('#menu-item-37').click(function () {
                $('body header').removeClass('show');
                $('#icon-menu').removeClass("open");
                tmpMenu = 0;
            });
            if (!$('body').hasClass('home')) {
                $('main').css('margin-top', header_h);
            }
            tmpMenu = 1;
        } else {
            $('body header').removeClass('show');
            $('main').css('margin-top', '0');
            tmpMenu = 0;
        }
    });

    if (typeof $.cookie('acceptCookie') == 'undefined') {
        $('.cookies').show();
        let cookies_H = $('.cookies').outerHeight();
        // console.log(cookies_H);
        $('footer').css('margin-bottom', cookies_H);
    }

    $('.cookies .col-1').click(function () {
        $('.cookies').slideUp();
        $.cookie('acceptCookie', 1, { expires: 365 });
        $('footer').css('margin-bottom', '0');
    });
});
