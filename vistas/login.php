<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Panaderia Leos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../public/login/css/login.css ">
    </head>
    <body  >
        <form class="login-form" action="../vistas/tablero.php" method="POST">
            <div class="login-form__logo-container">
                <img class="login-form__logo" src="../public/login/img/logo.png" alt="Logo">
            </div>
            <div class="login-form__content">
                <div class="login-form__header">Iniciar Sesion</div>
                <input class="login-form__input" type="text" name="dc_username" placeholder="Usuario">
                <input class="login-form__input" type="password" name="dc_username" placeholder="Contraseña">
                <button class="login-form__button" type="submit">ACCEDER</button>
                <div class="login-form__links">
                    <a class="login-form__link" href="./">Olvidaste tu contraseña?</a>
                </div>
            </div>
        </form>
    </body>
</html>
