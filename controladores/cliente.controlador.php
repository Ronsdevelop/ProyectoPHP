<?php
 
 require_once "../modelos/clientes.modelo.php";

 /* ====================================== 
  MOSTRAR PROVEEDORES
    ====================================== */

if(isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==1 ){
    
    $tabla = "cliente";
    $item=null;
    $valor=null;
    $respuesta = ModeloCliente::MdlMostrarClientes($tabla,$item,$valor);
    $datosTabla = array();

    foreach ($respuesta as $key => $value) {    
              

            $datosTabla[$key] =[
               

                "ID" => $value['ID'],

                "Rason" => $value['CLIENTE'],
                
                "Direccion" => $value['DIRECCION'],

                "Documento" => $value['DOCUMENTO'],

                "Numero" => $value['NUMERO'],

                "Alias" => $value['ALIAS'],

                "Referencia" => $value['REFERENCIA'],

                "Celular" => $value['CELULAR'],

                "Contacto" => $value['CONTACTO'],

                "Cumpleaños" => $value['CUMPLEANOS'],

                "Tipoc" => $value['TIPCLIE'],

                "Accion" => "<div class='btn-group dropdown'>
                                <a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-horizontal'></i></a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                <button class='dropdown-item btn-editar' idCliente='".$value['ID']."'><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Editar</button>                                
                                <button class='dropdown-item btn-eliminar' idCliente='".$value['ID']."'><i class='mdi mdi-delete mr-2 text-muted font-18 vertical-middle'></i>Eliminar</button>
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

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ&%$# ]+$/',$_POST["txtRazon"]) && preg_match('/^[0-9]+$/',$_POST["txtIndetificacion"]) ) {
           

            $tabla = "cliente";
          

            $datos = array(
                "rason" => $_POST["txtRazon"],            
                "direccion" => $_POST["txtDireccion"],
                "ruc" => $_POST["txtIndetificacion"],
                "alias" => $_POST["txtAlias"],
                "referencia" => $_POST["txtReferencia"],
                "contacto" => $_POST["txtContacto"],
                "nCelular" => $_POST["txtCelular"],
                "email" => $_POST["txtCorreo"],
                "cumpleanos" => $_POST["txtCumpleanos"],
                "tipoCliente" => $_POST["txtTipoCli"],
                "tipoIdent" => $_POST["txtTipoDoc"],
                "sucursal" => 1,
                "colaborador" => $_POST["txtColaborador"]
              
             
                
            );

            $respuesta = ModeloCliente::MdlIngresarCliente($tabla,$datos);
            echo json_encode($respuesta);
        
        }else{

            echo json_encode("okNO");
        }
    }

 /* ====================================== 
 EDITAR CLIENTE
 ====================================== */
}elseif (isset($_POST["txtOpcion"])&& $_POST["txtOpcion"]==3){

    if (isset($_POST["txtRazon"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáíóúÁÉÍÓÚ ]+$/',$_POST["txtRazon"])) { 
           
            $tabla = "cliente";

            $datos = array(
                "rason" => $_POST["txtRazon"],            
                "direccion" => $_POST["txtDireccion"],
                "ruc" => $_POST["txtIndetificacion"],
                "alias" => $_POST["txtAlias"],
                "referencia" => $_POST["txtReferencia"],
                "contacto" => $_POST["txtContacto"],
                "nCelular" => $_POST["txtCelular"],
                "email" => $_POST["txtCorreo"],
                "cumpleanos" => $_POST["txtCumpleanos"],
                "tipoCliente" => $_POST["txtTipoCli"],
                "tipoIdent" => $_POST["txtTipoDoc"],
                "sucursal" => 1,
                "colaborador" => $_POST["txtColaborador"],
                "codigo" => $_POST["txtId"]
            );

            $respuesta = ModeloCliente::MdlEditarCliente($tabla,$datos);
            echo json_encode($datos);
            

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
 