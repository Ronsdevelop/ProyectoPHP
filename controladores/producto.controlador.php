<?php
require_once "../modelos/productos.modelo.php";

 /* ====================================== 
  MOSTRAR USUARIOS
    ====================================== */

if(isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==1 ){
    
    $tabla = "producto";
    $item=null;
    $valor=null;
    $respuesta = ModeloProducto::MdlMostrarProductos($tabla,$item,$valor);
    $datosTabla = array();

    foreach ($respuesta as $key => $value) { 
       

            $datosTabla[$key] =[

                "ID" => $value['ID'],

                "NOMBRE" => $value['NOMBRE'],

                "IMAGEN" => "<a href='javascript: void(0);'><img src='".$value['IMAGEN']."' alt='contact-img' title='contact-img' class='rounded-circle avatar-xs'/></a>",

                "PRESENTACION" => $value['PRESENTACION'],

                "PRECIO" => $value['PRECIO'],

                "CATEGORIA" => $value['CATEGORIA'],

                "SECCION" => $value['SECCION'],
                
                "STOCK" => $value['STOCK'],

                "DESCRIPCION" => $value['DESCRIPCION'],

                "ACCION" => "<div class='btn-group dropdown'><a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-horizontal'></i></a><div class='dropdown-menu dropdown-menu-right'><button class='dropdown-item btn-editar' idProducto='".$value['ID']."' ><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Editar</button><button class='dropdown-item btn-eliminar' idProducto='".$value['ID']."' producto='".$value['NOMBRE']."' fotoProducto='".$value['IMAGEN']."'><i class='mdi mdi-delete mr-2 text-muted font-18 vertical-middle'></i>Eliminar</button></div></div>"
            ];

    } 

    echo json_encode($datosTabla);

     /* ====================================== 
      AGREGAR USUARIO
      ====================================== */

}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==2){  

    if (isset($_POST["txtNombres"])) {

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

                $directorio = "../vistas/img/usuarios/".$_POST["txtUsuario"];
                mkdir($directorio,0755);

                /* ------------------------- */
                /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                /* ------------------------- */

                if ($_FILES["nuevaFoto"]["type"]== "image/jpeg") {

                    /* ====================================== 
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    ====================================== */
                    
                    $aleatorio = mt_rand(100,999);
                    $ruta = "../vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".jpeg";
                    $rutaBD = "vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".jpeg";
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
                    $ruta = "../vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".png";
                    $rutaBD = "vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".png";
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
                "nombre" => $_POST["txtNombres"],
                "aPaterno" => $_POST["txtApaterno"],
                "aMaterno" => $_POST["txtAmaterno"],
                "dni" => $_POST["txtDni"],
                "direccion" => $_POST["txtDireccion"],
                "avatar" => $rutaBD,
                "nCelular" => $_POST["txtCelular"],
                "fIngreso" => $_POST["txtFecha"],
                "user" => $_POST["txtUsuario"],
                "pass" => $conEncriptada,
                "email" => $_POST["txtCorreo"],
                "cargo_id" => $_POST["txtTipo"],
                "estado" => 1
            );

            $respuesta = ModeloUsuario::MdlIngresarUsuario($tabla,$datos);
            echo json_encode($respuesta);
        
        }else{

            echo json_encode("okNO");
        }
    }

 /* ====================================== 
 EDITAR USUARIOS
 ====================================== */
}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==3){

    if (isset($_POST["txtNombres"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtNombres"])) { 
                /* ====================================== 
                VALIDAR IIMAGEN
                ====================================== */  

            $rutaBD=$_POST["fotoSinEditar"];

            if (isset($_FILES["nuevaFoto"]["tmp_name"])&& !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                $nuevoAncho = 500;
                $nuevoAlto = 500;
                /* ----- ----- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ----- ----- */
                $directorio = "../vistas/img/usuarios/".$_POST["txtUsuario"];
            
                /* ====================================== 
                PIRMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                ====================================== */
                if (!empty($_POST["fotoSinEditar"])) {

                    unlink("../".$_POST["fotoSinEditar"]);

                }else {

                    mkdir($directorio,0755);

                }

                /* ------------------------- */
                /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                /* ------------------------- */
                if ($_FILES["nuevaFoto"]["type"]== "image/jpeg") {
                    /* ====================================== 
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    ====================================== */
                    $aleatorio = mt_rand(100,999);
                    $rutaEdit = "../vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".jpeg";
                    $rutaBD = "vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".jpeg";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                    //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino,$rutaEdit);
                    
                }
                /* ------------------------- */
                /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                /* ------------------------- */
                if ($_FILES["nuevaFoto"]["type"]== "image/png") {
                    /* ====================================== 
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    ====================================== */
                    $aleatorio = mt_rand(100,999);
                    $rutaEdit = "../vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".png";
                    $rutaBD = "vistas/img/usuarios/".$_POST["txtUsuario"]."/".$aleatorio.".png";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                    //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino,$rutaEdit);
                    
                }

                
            }
            $tabla = "colaborador";

            if ($_POST["txtPass"] != "") {

                if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["txtPass"])) {

                    $conEncriptada = password_hash($_POST["txtPass"], PASSWORD_DEFAULT);  

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
                "nombre"=>$_POST["txtNombres"],
                "aPaterno"=>$_POST["txtApaterno"],
                "aMaterno"=>$_POST["txtAmaterno"],
                "dni"=>$_POST["txtDni"],
                "direccion"=>$_POST["txtDireccion"],
                "avatar"=>$rutaBD,
                "nCelular"=>$_POST["txtCelular"],
                "fIngreso"=>$_POST["txtFecha"],
                "user"=>$_POST["txtUsuario"],
                "pass"=>$conEncriptada,
                "email"=>$_POST["txtCorreo"],
                "cargo_id"=>$_POST["txtTipo"]);

            $respuesta = ModeloUsuario::MdlEditarUsuario($tabla,$datos);
            echo json_encode($respuesta);
            

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
?>