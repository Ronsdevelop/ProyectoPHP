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
        <link rel="shortcut icon" href="">

        <!-- App css -->
        <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>  
        <!-- Incio de pagina -->
        <div id="wrapper"> 
        <?php

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
            }
        }
            
        ?>   
    

    

        <?php

        /* ----- ----- FOOTER ----- ----- */
            include "modulos/footer.php";
    
        ?>         


        </div>
        <!-- END wrapper -->
 

     

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="public/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.min.js"></script>
        
    </body>
</html>