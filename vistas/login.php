<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../public/login/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
          <img src="../public/login/img/logo.png" width="300" height="150" alt="logo"/>

      </div>
      <div class="login-box">
        <form class="login-form" action="categoria.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIAR SESION</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Siempre Conectado</span>
                </label>
              </div>
                 
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-panaderia btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>
    
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
 
    <script src="../public/login/js/jquery-3.2.1.min.js"></script> 
    <script src="../public/login/js/bootstrap.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../public/login/js/plugins/pace.min.js"></script>
  
  </body>
</html>