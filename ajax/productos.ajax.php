<?php
    require_once "../controladores/producto.controlador.php ";
    require_once "../modelos/productos.modelo.php"; 

    class AjaxProductos{

        public $codProvedor;
        public function ajaxEditarPoductos(){
            $tabla ="producto";
            $item = "producto_id";
            $valor = $this-> codProvedor;
            $respuesta = ModeloProducto::MdlMostrarProductos($tabla,$item,$valor);
            echo json_encode($respuesta);


        }

        public $proveedorEliminar;
        public function ajaxEliminarProveedor(){
            $tabla = "producto";
            $item = "producto_id";
            $valor = $this-> proveedorEliminar;
            $respuesta = ModeloProveedor::MdlEliminaProveedor($tabla,$item,$valor);
            echo json_encode($respuesta);
      
            
        }

        public $valorValidar;
        public $itemValidar;
        public function ajaxValidarProveedor(){
            $tabla = "producto";
            $item = $this->itemValidar;;
            $valor = $this->valorValidar;
            $respuesta = ModeloProveedor::MdlMostrarProveedores($tabla,$item,$valor);
            echo json_encode($respuesta);
       
          
        }
    }


    if (isset($_POST["codigoProd"])) {
        $proveedor = new AjaxProductos();
        $proveedor -> codProvedor = $_POST["codigoProd"];
        $proveedor-> ajaxEditarPoductos();
         
    }
    if (isset($_POST["codProveedor"])) {
        $pEliminar = new AjaxProveedores();
        $pEliminar -> proveedorEliminar = $_POST["codProveedor"];
        $pEliminar -> ajaxEliminarProveedor();
    }

    if (isset($_POST["valorValidar"])) {
        $validarProv = new AjaxProveedores();
        $validarProv -> valorValidar=$_POST["valorValidar"];
        $validarProv -> itemValidar=$_POST["itemValidar"];
        $validarProv -> ajaxValidarProveedor();
    }




?>