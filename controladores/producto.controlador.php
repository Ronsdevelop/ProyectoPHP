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
        
        $imagen="";

        if ($value['IMAGEN'] != "") {
            $imagen = $value['IMAGEN'];
        }else{
            $imagen = "vistas/img/productos/productoDefault.png";
        }
       

            $datosTabla[$key] =[

                "ID" => $value['ID'],

                "NOMBRE" => $value['NOMBRE'],

                "IMAGEN" => "<a href='javascript: void(0);'><img src='".$imagen."' alt='contact-img' title='contact-img' class='rounded-circle avatar-sm'/></a>",

                "PRESENTACION" => $value['PRESENTACION'],

                "PRECIO" => $value['PRECIO'],

                "CATEGORIA" => $value['CATEGORIA'],

                "SECCION" => $value['SECCION'],
                
                "STOCK" => $value['STOCK'],

                "DESCRIPCION" => $value['DESCRIPCION'],

                "ACCION" => "<div class='btn-group dropdown'><a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-horizontal'></i></a><div class='dropdown-menu dropdown-menu-right'><button class='dropdown-item btn-editar' idProducto='".$value['ID']."' ><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Editar</button><button class='dropdown-item btn-eliminar' idProducto='".$value['ID']."' producto='".$value['CATEGORIA']."' fotoProducto='".$imagen."'><i class='mdi mdi-delete mr-2 text-muted font-18 vertical-middle'></i>Eliminar</button></div></div>"
            ];

    } 

    echo json_encode($datosTabla);

     /* ====================================== 
      AGREGAR USUARIO
      ====================================== */

}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==2){

  


 if (isset($_POST["txtNombre"])) {

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtNombre"])) {
            /* ====================================== 
            VALIDAR FOTO
            ======================================  */
            $ruta ="";
            $rutaBD="";

            if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /* ----- ----- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ----- -----  */
                if (!file_exists("../vistas/img/productos/".$_POST["categoria"]) ) {
                    $directorio = "../vistas/img/productos/".$_POST["categoria"];
                    mkdir($directorio,0755);
                } 

               

                /* ------------------------- */
                /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP  
                /* -------------------------  */

                if ($_FILES["nuevaFoto"]["type"]== "image/jpeg") {

                    /* ====================================== 
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    ======================================  */
                    
                 
                    $ruta = "../vistas/img/productos/".$_POST["categoria"]."/".$_POST["txtId"].".jpeg";
                    $rutaBD = "vistas/img/productos/".$_POST["categoria"]."/".$_POST["txtId"].".jpeg";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                    //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino,$ruta);
                    
                }
                /* ------------------------- */
                /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
                /* -------------------------  */
                if ($_FILES["nuevaFoto"]["type"]== "image/png") {
                    /* ====================================== 
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    ======================================  */
                
                    $ruta = "../vistas/img/productos/".$_POST["categoria"]."/".$_POST["txtId"].".png";
                    $rutaBD = "vistas/img/productos/".$_POST["categoria"]."/".$_POST["txtId"].".png";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                    //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino,$ruta);
                    
                }

                
            }           
         


            $tabla = "producto";
           

            $datos = array(
                "nombre" => $_POST["txtNombre"],
                "presentacion" => $_POST["txtPresentacion"],
                "stock" => $_POST["txtStock"],        
                "precio" => $_POST["txtPrecio"],
                "img" => $rutaBD,
                "descripcion" => $_POST["txtDescripcion"],
                "idcategoria" => $_POST["txtCategoria"]
                 
            );

            $respuesta = ModeloProducto::MdlIngresarProducto($tabla,$datos);
            echo json_encode($respuesta);
        
        }else{

            echo json_encode("okNO");
        }
    }  

 
    /* ====================================== 
 EDITAR USUARIOS
 ====================================== */
}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==3){

    if (isset($_POST["txtNombre"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtNombre"])) { 
                /* ====================================== 
                VALIDAR IIMAGEN
                ====================================== */  

            $rutaBD=$_POST["fotoSinEditar"];

            if (isset($_FILES["nuevaFoto"]["tmp_name"])&& !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                $nuevoAncho = 500;
                $nuevoAlto = 500;
                /* ----- ----- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ----- ----- */
                if (!file_exists("../vistas/img/productos/".$_POST["categoria"])) {
                    $directorio = "../vistas/img/productos/".$_POST["categoria"];
                }
               
            
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
                 
                    $rutaEdit = "../vistas/img/productos/".$_POST["categoria"]."/".$_POST["txtId"].".jpeg";
                    $rutaBD = "vistas/img/productos/".$_POST["txtUsuario"]."/".$_POST["txtId"].".jpeg";
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
                    
                    $rutaEdit = "../vistas/img/productos/".$_POST["txtUsuario"]."/".$_POST["txtId"].".png";
                    $rutaBD = "vistas/img/productos/".$_POST["txtUsuario"]."/".$_POST["txtId"].".png";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                    //imagecopyresized(dst_image,src_image,dst_x,dst_y,src_x,src_y,dst_w,dst_h,src_w,src_h);
                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino,$rutaEdit);
                    
                }

                
            }
            $tabla = "producto";

           
            $datos = array(
                "idproducto"=>$_POST["txtId"],
                "nombre" => $_POST["txtNombre"],
                "presentacion" => $_POST["txtPresentacion"],
                "stock" => $_POST["txtStock"],        
                "precio" => $_POST["txtPrecio"],
                "img" => $rutaBD,
                "descripcion" => $_POST["txtDescripcion"],
                "idcategoria" => $_POST["txtCategoria"]
            );

            $respuesta = ModeloProducto::MdlEditarProducto($tabla,$datos);
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

}else{
    $respuesta = ModeloProducto::MdlCodigoProducto();
    echo json_encode($respuesta);
}
?>