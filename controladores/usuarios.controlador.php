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
                                $_SESSION["iniciarSesion"]="ok";
                                $_SESSION["nombre"]=$respuesta["nombre"]." ".$respuesta["aPaterno"];
                                $_SESSION["avatar"]=$respuesta["avatar"];
                                
                                echo '<script>
                                            window.location = "inicio";                      
                                </script>';

                                
                            
                            }else {
                                echo'<br><div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>Error al ingresar, vuelve a intentarlo</div>';
                            }
                    
                        }
                    }

            }

            /* ------------------------- */
            /* REGISTRO DE USUARIO */
            /* ------------------------- */
            static public function ctrCrearUsuario(){

        
            

                if(isset($_POST["txtNombres"])) {
                    if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtNombres"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["txtUsuario"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["txtPass"])) {
                    /* ====================================== 
                    VALIDAR FOTO
                    ====================================== */
                    $ruta ="";

                        if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                            list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
                            /* ----- ----- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ----- ----- */
                            $directorio = "vistas/public/img/usuarios/".$_POST["txtUsuario"];
                            mkdir($directorio,0755);
                            /* ------------------------- */
                            /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                            /* ------------------------- */
                            if ($_FILES["nuevaFoto"]["type"]== "image/jpeg") {
                            /* ====================================== 
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            ====================================== */
                            $aleatorio = mt_rand(100,999);
                            $ruta = "vistas/public/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".jpeg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                            //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                            imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                            imagejpeg($destino,$ruta);
                                
                            }
                            /* ------------------------- */
                            /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                            /* ------------------------- */
                            if ($_FILES["nuevaFoto"]["type"]== "image/png") {
                                /* ====================================== 
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                ====================================== */
                                $aleatorio = mt_rand(100,999);
                                $ruta = "vistas/public/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".png";
                                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                                $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                                //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                                imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                                imagejpeg($destino,$ruta);
                                
                            }

                            
                        }


                        $tabla = "colaborador";
                        $conEncriptada = password_hash($_POST["txtPass"], PASSWORD_DEFAULT);
                        $datos = array(
                                "nombre"=>$_POST["txtNombres"],
                                "aPaterno"=>$_POST["txtApaterno"],
                                "aMaterno"=>$_POST["txtAmaterno"],
                                "dni"=>$_POST["txtDni"],
                                "direccion"=>$_POST["txtDireccion"],
                                "avatar"=>$ruta,
                                "nCelular"=>$_POST["txtCelular"],
                                "fIngreso"=>$_POST["txtFecha"],
                                "user"=>$_POST["txtUsuario"],
                                "pass"=>$conEncriptada,
                                "email"=>$_POST["txtCorreo"],
                                "cargo_id"=>$_POST["txtTipo"]
                        );
                        $respuesta = ModeloUsuario::MdlIngresarUsuario($tabla,$datos);
                        if ($respuesta =="ok") {
                            
                            echo'
                            <script> 
                            Swal.fire({
                                icon:"success",
                                title:"Se Registro correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "usuarios";
        
                                }
        
                            });
                            </script>
                            ';
                            
                        }else {
                            echo'
                        <script> 
                        Swal.fire({
                            icon:"error",
                            title:"Error al Registro",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "usuarios";

                            }

                        });
                        </script>
                        ';
                        }    
                    }else{
                        echo'
                        <script> 
                        Swal.fire({
                            icon:"error",
                            title:"No puede ingresar caracteres especiaes",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "usuarios";

                            }

                        });

                        </script>
                        ';
                    }
                }
            }

            static public function ctrMostrarUsuarios($item,$valor){

                $tabla = "colaborador";
                $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);

                return $respuesta;

            }

            static public function crtMostrarCargos($item,$valor){
                $tabla = "cargo";
                $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
                return $respuesta;
            }

            /* ====================================== 
            editar usuario
            ====================================== */

            static public function ctrEditarUsuario(){
                if (isset($_POST["txtNombresEdit"])){
                    if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtNombresEdit"])) { 
                            /* ====================================== 
                            VALIDAR IIMAGEN
                            ====================================== */  

                        $rutaEdit=$_POST["fotoSinEditar"];
                        if (isset($_FILES["nuevaFotoEdit"]["tmp_name"])&& !empty($_FILES["nuevaFotoEdit"]["tmp_name"])) {
                            list($ancho,$alto)=getimagesize($_FILES["nuevaFotoEdit"]["tmp_name"]);
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
                            /* ----- ----- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ----- ----- */
                            $directorio = "vistas/public/img/usuarios/".$_POST["txtUsuarioEdit"];
                          
                            /* ====================================== 
                            PIRMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                            ====================================== */
                            if (!empty($_POST["fotoSinEditar"])) {
                                unlink($_POST["fotoSinEditar"]);
                            }else {
                                mkdir($directorio,0755);
                            }

                            /* ------------------------- */
                            /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                            /* ------------------------- */
                            if ($_FILES["nuevaFotoEdit"]["type"]== "image/jpeg") {
                                /* ====================================== 
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                ====================================== */
                                $aleatorio = mt_rand(100,999);
                                $rutaEdit = "vistas/public/img/usuarios/".$_POST["txtUsuarioEdit"]."/".$aleatorio.".jpeg";
                                $origen = imagecreatefromjpeg($_FILES["nuevaFotoEdit"]["tmp_name"]);
                                $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                                //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                                imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                                imagejpeg($destino,$rutaEdit);
                                
                            }
                            /* ------------------------- */
                            /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                            /* ------------------------- */
                            if ($_FILES["nuevaFotoEdit"]["type"]== "image/png") {
                                /* ====================================== 
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                ====================================== */
                                $aleatorio = mt_rand(100,999);
                                $rutaEdit = "vistas/public/img/usuarios/".$_POST["txtUsuarioEdit"]."/".$aleatorio.".png";
                                $origen = imagecreatefromjpeg($_FILES["nuevaFotoEdit"]["tmp_name"]);
                                $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                                //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                                imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                                imagejpeg($destino,$rutaEdit);
                                
                            }

                            
                        }
                        $tabla = "colaborador";
                        if ($_POST["txtPassEdit"] != "") {
                            if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["txtPassEdit"])) {
                                $conEncriptada = password_hash($_POST["txtPassEdit"], PASSWORD_DEFAULT);   
                            }else {
                                echo' <script> 
                                Swal.fire({
                                    icon:"error",
                                    title:"!La contreseña no puede ir vacia o llevar caracteres especiales",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){

                                    if(result.value){
                                    
                                        window.location = "usuarios";

                                    }

                                });
                                </script>
                                ';
                            }
                        }else {
                            $conEncriptada = $_POST["passwordActual"];
                        }
                        $datos = array(
                            "nombre"=>$_POST["txtNombresEdit"],
                            "aPaterno"=>$_POST["txtApaternoEdit"],
                            "aMaterno"=>$_POST["txtAmaternoEdit"],
                            "dni"=>$_POST["txtDniEdit"],
                            "direccion"=>$_POST["txtDireccionEdit"],
                            "avatar"=>$rutaEdit,
                            "nCelular"=>$_POST["txtCelularEdit"],
                            "fIngreso"=>$_POST["txtFechaEdit"],
                            "user"=>$_POST["txtUsuarioEdit"],
                            "pass"=>$conEncriptada,
                            "email"=>$_POST["txtCorreoEdit"],
                            "cargo_id"=>$_POST["txtTipoEdit"]);
                        $respuesta = ModeloUsuario::MdlEditarUsuario($tabla,$datos);
                        

                        if ($respuesta == "ok") {
                            echo' <script> 
                                    Swal.fire({
                                        icon:"success",
                                        title:"!Usuario Editado Correctamente!!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    }).then(function(result){
    
                                        if(result.value){
                                        
                                            window.location = "usuarios";
    
                                        }
    
                                    });
                                    </script>
                                    ';
                            
                        }else{
                            echo' <script> 
                                    Swal.fire({
                                        icon:"error",
                                        title:"!Error al editar el usuario!!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    }).then(function(result){
    
                                        if(result.value){
                                        
                                            window.location = "usuarios";
    
                                        }
    
                                    });
                                    </script>
                                    ';

                        } 

                    }else{

                        echo' <script> 
                                Swal.fire({
                                    icon:"error",
                                    title:"¡El nombre no puede ir vacío o llevar caracteres especiales!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){

                                    if(result.value){
                                    
                                        window.location = "usuarios";

                                    }

                                });
                                </script>
                                ';
        
                    }
                    
        
                }
            }

    }
?>