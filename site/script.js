$(document).ready(function () {
    /*---------Register/login form-----------*/
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

    $('#logout').click(function () {
        window.location.href = "/logout";
    });

    $('.closelog').click(function () {
        $('.logform-container').hide();
    });

    /*---------Image size----------*/
    $('div.image > img').css({'height': '195px'});
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
    /*---------Zoom----------------*/
    
    $('.post').click(function () {
        var imgId = $(this).attr('id');
        $.ajax({
            type: 'POST',
            cache: false,
            url: '/site/zoomedimg.php',
            data: {id: imgId},
            dataType: "json",
            success: function (data) {
                $('.img').append('<img src="' + data[0]['image'] + '">');
                if ($('.img img').width() > 960){
                    $('.img img').css('width','960px');
                }
                $('.tit-name').html(data[0]['name']);
                $('.tit-author').append("Автор: " + data[0]['postedBy']);
                $('.tit-date').append("Опубликовано: " + data[0]['postDate'])
            }
        });
        $('body').css('overflow-y','hidden');
        $('.zoom-container').show();
    });

    $('.closeimg').click(function () {
        $('.zoom-container').hide();
        $('.img').empty();
        $('.tit-name').empty();
        $('.tit-author').empty();
        $('.tit-date').empty();
        $('body').css('overflow-y','inherit');
    });


});
