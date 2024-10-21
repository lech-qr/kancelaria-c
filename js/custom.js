﻿$(document).ready(function () {
    // Menu responsywne
    let header_h = $('body header').outerHeight();
    console.log(header_h);

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
});
