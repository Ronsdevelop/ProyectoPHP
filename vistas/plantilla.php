<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Plantilla - Panaderia Leos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de Gestion para la Panaderia Leos" name="Descripcion" />
        <meta content="Ronsdevelop" name="Autor" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="icon" href="logo/logo_sistema_sm.png">

        <!-- App css -->
        <link href="vistas/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/public/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>    
  
        <?php 
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"]== "ok") {   
  
        /* ----- Incio de la pagina o wrapper----- */

        echo '<div id="wrapper">';

        /* ----- ----- CABEZOTE ----- ----- */
            include "modulos/cabezote.php";

        /* ----- ----- MENU ----- ----- */
            include "modulos/menu.php";

        /* ----- ----- CONTENIDO ----- ----- */
        if (isset($_GET["ruta"])) {
            if ($_GET["ruta"]== "inicio" ||
                $_GET["ruta"]== "usuarios"
            ) {
                include "modulos/".$_GET["ruta"].".php";  
            }else{
                include "modulos/404.php" ;
             }
        }else{
            include "modulos/inicio.php" ; 
        }
            
       

        /* ----- ----- FOOTER ----- ----- */
            include "modulos/footer.php";

        echo '</div>';
        
        /* ----- Fin del Wrapper ----- */
    }else{
        include "modulos/login.php";
    }
    
        ?>         



 

     

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="vistas/public/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="vistas/public/assets/js/app.min.js"></script>
        
    </body>
</html>