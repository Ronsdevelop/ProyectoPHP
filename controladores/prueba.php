<?php
require_once "../modelos/usuarios.modelo.php";

if (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==1 ) {
 
  $tabla = "colaborador";
  $item=null;
  $valor=null;
  $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
  $datosTabla = array();

  foreach ($respuesta as $key => $value) {  
    if ($value['estado'] != 0) {
      $estado=0;
      $claseEstado ='mdi-block-helper';
      $elementoEstado ='Desactivar';
      $campoEstadoClase ='badge-success';
      $campoEstadoElemento ='Activo';
    }else{
      $estado=1;
      $claseEstado ='mdi-check-all';
      $elementoEstado ='Activar';
      $campoEstadoClase ='badge-danger';
      $campoEstadoElemento ='Inactivo';

    }       
    $datosTabla[$key] =[
      'ID' => $value['colaborador_id'] ,
      'Nombre'=> $value['nombre'].' '.$value['aPaterno'].' '.$value['aMaterno'],
      'Foto'=> "<a href='javascript: void(0);'><img src='".$value['avatar']."' alt='contact-img' title='contact-img' class='rounded-circle avatar-xs'/></a>",
      'Dni'=> $value['dni'],
      'Direccion'=> $value['direccion'],
      'Usuario'=> $value['user'],
      'ULogeo'=> $value['ultimoLogeo'],
      'Estado'=> "<span class='badge ".$campoEstadoClase."'} classEstado' idUsuario='".$value['colaborador_id']."'>".$campoEstadoElemento."</span>",
      'Telefono'=> $value['nCelular'],
      'Accion'=> "<div class='btn-group dropdown'><a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-horizontal'></i></a><div class='dropdown-menu dropdown-menu-right'><button class='dropdown-item'  onClick='editUser(".$value['colaborador_id'].")'><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Editar</button><button class='dropdown-item btn-activar' idUsuario='".$value['colaborador_id']."' estadoUsuario='".$estado."'><i class='mdi ".$claseEstado." mr-2 text-muted font-18 vertical-middle'></i>".$elementoEstado."</button><button class='dropdown-item btn-eliminar' idUsuario='".$value['colaborador_id']."' usuario='".$value['user']."' fotoUser='".$value['avatar']."'><i class='mdi mdi-delete mr-2 text-muted font-18 vertical-middle'></i>Eliminar</button></div></div>"
    ];
  } 
 
  echo json_encode($datosTabla);
}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==2 ){  

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
            $directorio = "../vistas/public/img/usuarios/".$_POST["txtUsuario"];
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
                "cargo_id"=>$_POST["txtTipo"],
                "estado"=>1
        );
        $respuesta = ModeloUsuario::MdlIngresarUsuario($tabla,$datos);
        echo json_encode($respuesta);
    
    }else{

        echo json_encode("ok");
    }
}

 
}

?>