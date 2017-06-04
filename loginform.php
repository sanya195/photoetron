<script>
    $('form div .reg').click(function () {
        $.ajax({
            type: 'POST',
            cache: false,
            url: '/registerform.php',
            success: function (html) {
                $('.logform > form').html(html).attr('action', 'reg.php');
                $('.logform').css('height', '360px');
            }
        });
    });
</script>
<div style="position: relative; margin: auto">
    <p><label for="login">Логин:<br><input type="text" name="login" autofocus required value=""></label></p>
    <p><label for="login">Пароль:<br><input type="password" name="password" required></label></p>
    <p><input class="button" id="register" name= "loginbtn" type="submit" value="Войти"></p>
    <div class="reg">
        Регистрация
    </div>
</div>