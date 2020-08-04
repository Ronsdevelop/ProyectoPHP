 <?php
    class ControladorUsuarios{

        /* ----- Ingreso de Usuarios ----- */   
        public function ctrIngresoUsuario(){
            if (isset($_POST["ingUsuario"])) {
               if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"])) {
                   $tabla = "colaborador";
                   $item = "user";
                   $valor = $_POST["ingUsuario"];

                   $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
                   
                   if ($respuesta["user"]== $_POST["ingUsuario"] && $respuesta["pass"]==$_POST["ingPassword"]) {
                       $_SESSION["iniciarSesion"]="ok";
                       echo '<script>
                                window.location = "inicio";                      
                       </script>';

                     
                   
                   }else {
                       echo'<br><div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>Error al ingresar, vuelve a intentarlo</div>';
                   }
           
               }
            }

        }


    }
?>