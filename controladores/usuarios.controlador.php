 <?php
    class ControladorUsuarios{

            /* ----- Ingreso de Usuarios ----- */   
            static public function ctrIngresoUsuario(){
                    if (isset($_POST["ingUsuario"])) {
                        if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"])) {
                            $tabla = "colaborador";
                            $item = "user";
                            $valor = $_POST["ingUsuario"];

                            $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
                
                            
                            if ($respuesta["user"]== $_POST["ingUsuario"] && password_verify($_POST["ingPassword"],$respuesta["pass"])) {

                                if ($respuesta["estado"]==1) {
                                    $_SESSION["iniciarSesion"]="ok";
                                    $_SESSION["nombre"]=$respuesta["nombre"]." ".$respuesta["aPaterno"];
                                    $_SESSION["avatar"]=$respuesta["avatar"];
                                    $_SESSION["idUser"]=$respuesta["colaborador_id"];
                                     

                                    /* ----- REGISTRAR FECHA DEL ULTIMO LOGIN ----- */
                                    date_default_timezone_set("America/Lima");

                                    $fecha = date('y-m-d');
                                    $hora = date('H:i:s');
                                    $tabla = "colaborador";
                                    $fechaActual = $fecha.' '.$hora;
                                    $item1 = "ultimoLogeo";
                                    $valor1=$fechaActual;
                                    $item2="colaborador_id";
                                    $valor2= $respuesta["colaborador_id"];

                                    $ultimoLogin = ModeloUsuario::MdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
                                    if ($ultimoLogin =="ok") {
                                        
                                        echo '<script>
                                        window.location = "inicio";                      
                                        </script>';
                                    }



                                }else {
                                    echo'<br><div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>No puedes Acceder tú usuario todavia no está activado!!</div>';
                                }
                               

                                
                            
                            }else {
                                echo'<br><div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>Error al ingresar, vuelve a intentarlo</div>';
                            }
                    
                        }
                    }

            } 
            
            static public function ctrMostrarDatosPerfil(){
                if (isset($_SESSION["idUser"])) {
                   
                        $tabla = "colaborador";
                        $item = "colaborador_id";
                        $valor = $_SESSION["idUser"];

                        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
                        return $respuesta;
                }

            }
            
             /*

            static public function crtMostrarCargos($item,$valor){
                $tabla = "cargo";
                $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
                return $respuesta;
            }
         

            static public function ctrMostrarUsuarios($item,$valor){

                $tabla = "colaborador";
                $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);

                return $respuesta;

            } */

           

    }
?>