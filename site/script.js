$(document).ready(function () {
    /*---------Register form-----------*/
    $.ajax({
        type: 'POST',
        cache: false,
        url: '/loginform.php',
        success: function (html) {
            $('.logform > form').html(html).attr('action','login.php');
            $('.logform').css('height','150px');
        }
    });

    $('.reg').click(function () {
        
    });

    $('#login').click(function () {
        $('.logform-container').show();
    });

    $('.close').click(function () {
        $('.logform-container').hide();
    })

    /*---------Image size----------*/
    $('div.image>img').css({'height': '195px'});
    var w = $('div.image>img').width();
    var imgWidth = w - 248;
    var imgMargin = -(imgWidth / 2);
    $('div.image>img').css({'margin-left': imgMargin});

    $('.post').mouseenter(function () {
        if ($(this).children('.zoom').css('display') == 'none') {
            $(this).children('.zoom').fadeIn(200);
            return false;
        }
    })
    $('.post').mouseleave(function () {
        if ($(this).children('.zoom').css('display') != 'none') {
            $(this).children('.zoom').fadeOut(200);
            return false;
        }
    })
});
