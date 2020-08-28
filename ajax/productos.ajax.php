<?php
    
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

        public $elimarProducto;
        public $eliminaImagen;
        public $eliminaCarpeta;
        public function ajaxEliminarProducto(){
            $tabla = "producto";
            $item = "producto_id";
            $valor = $this-> elimarProducto;
            $imagen=$this-> eliminaImagen;
            $carpeta = $this-> eliminaCarpeta;
           
     
             $respuesta = ModeloProducto::MdlEliminaProducto($tabla,$item,$valor); 
        
            if ($respuesta != "error") {                  
                 unlink('../'.$imagen); 
                 $archivos = scandir('../vistas/img/productos/'.$carpeta."/".$valor);
                if (count($archivos) == 2) {
                    rmdir('../vistas/img/productos/'.$carpeta."/".$valor);
                }
                $archivos = scandir('../vistas/img/productos/'.$carpeta."/");
                if (count($archivos) == 2) {
                    rmdir('../vistas/img/productos/'.$carpeta."/");
                }

                          
            } 
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


    if (isset($_POST["codigoProducto"])) {
        $proveedor = new AjaxProductos();
        $proveedor -> codProvedor = $_POST["codigoProducto"];
        $proveedor-> ajaxEditarPoductos();
         
    }
    if (isset($_POST["codProducto"])) {
        $pEliminar = new AjaxProductos();
        $pEliminar -> elimarProducto = $_POST["codProducto"];
        $pEliminar -> eliminaImagen = $_POST["imgProducto"];
        $pEliminar -> eliminaCarpeta = $_POST["categProducto"];
        $pEliminar -> ajaxEliminarProducto();
    }

    if (isset($_POST["valorValidar"])) {
        $validarProv = new AjaxProveedores();
        $validarProv -> valorValidar=$_POST["valorValidar"];
        $validarProv -> itemValidar=$_POST["itemValidar"];
        $validarProv -> ajaxValidarProveedor();
    }




?>