<?php
 
 require_once "../modelos/proveedores.modelo.php";

 /* ====================================== 
  MOSTRAR PROVEEDORES
    ====================================== */

if(isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==1 ){
    
    $tabla = "proveedor";
    $item=null;
    $valor=null;
    $respuesta = ModeloProveedor::MdlMostrarProveedores($tabla,$item,$valor);
    $datosTabla = array();

    foreach ($respuesta as $key => $value) {    
        $IdProveedor = $value['proveedor_id'];
        settype($IdProveedor, 'string');       

            $datosTabla[$key] =[
               

                "ID" => $IdProveedor,

                "Rason" => $value['rason'],
                
                "Ruc" => $value['ruc'],

                "Direccion" => $value['direccion'],

                "Contacto" => $value['contacto'],

                "Email" => $value['email'],

                "Celular" => $value['nCelular'],

                "Telefono" => $value['nFono'],

                "Referencia" => $value['referencia'],

                "Accion" => "<div class='btn-group dropdown'>
                                <a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-horizontal'></i></a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                <button class='dropdown-item btn-editarPro' idProveedor='".$value['proveedor_id']."'><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Editar</button>                                
                                <button class='dropdown-item btn-eliminarPro' idProveedor='".$value['proveedor_id']."'><i class='mdi mdi-delete mr-2 text-muted font-18 vertical-middle'></i>Eliminar</button>
                                </div>
                            </div>"
            ];

    } 

    echo json_encode($datosTabla);

     /* ====================================== 
      AGREGAR PROVEEDOR
      ====================================== */

}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==2){  

    if (isset($_POST["txtRazon"])) {

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ&%$# ]+$/',$_POST["txtRazon"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["txtIndetificacion"]) ) {
           

            $tabla = "proveedor";
          

            $datos = array(
                "rason" => $_POST["txtRazon"],
                "ruc" => $_POST["txtIndetificacion"],
                "direccion" => $_POST["txtDireccion"],
                "contacto" => $_POST["txtContacto"],
                "email" => $_POST["txtCorreo"],
                "nCelular" => $_POST["txtCelular"],
                "nFono" => $_POST["txtFijo"],
                "referencia" => $_POST["txtReferencia"]
            );

            $respuesta = ModeloProveedor::MdlIngresarProveedor($tabla,$datos);
            echo json_encode($respuesta);
        
        }else{

            echo json_encode("okNO");
        }
    }

 /* ====================================== 
 EDITAR PROVEEDOR
 ====================================== */
}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==3){

    if (isset($_POST["txtRazon"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtRazon"])) { 
           
            $tabla = "proveedor";

            $datos = array(
                "rason" => $_POST["txtRazon"],
                "ruc" => $_POST["txtIndetificacion"],
                "direccion" => $_POST["txtDireccion"],
                "contacto" => $_POST["txtContacto"],
                "email" => $_POST["txtCorreo"],
                "nCelular" => $_POST["txtCelular"],
                "nFono" => $_POST["txtFijo"],
                "referencia" => $_POST["txtReferencia"],
                "proveedor_id" => $_POST["txtId"]
            );

            $respuesta = ModeloProveedor::MdlEditarProveedor($tabla,$datos);
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
 