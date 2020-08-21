<?php
    require_once "../controladores/cliente.controlador.php ";
    require_once "../modelos/clientes.modelo.php"; 

    class AjaxClientes{

        public $codCliente;
        public function ajaxEditarCliente(){
            $tabla ="cliente";
            $item ="cliente_id";
            $valor = "CL00000001";
            $respuesta = ModeloCliente::MdlMostrarClientes($tabla,$item,$valor);
            echo json_encode($respuesta);


        }

        public $clienteEliminar;
        public function ajaxEliminarCliente(){
            $tabla = "cliente";
            $item = "cliente_id";
            $valor = $this-> clienteEliminar;
            $respuesta = ModeloCliente::MdlEliminaCliente($tabla,$item,$valor);
            echo json_encode($respuesta);
      
            
        }

        public $valorValidar;
        public $itemValidar;
        public function ajaxValidarCliente(){
            $tabla = "cliente";
            $item = $this-> itemValidar;
            $valor = $this-> valorValidar;
            $respuesta = ModeloCliente::MdlMostrarClientes($tabla,$item,$valor);
            echo json_encode($respuesta);
       
          
        }
    }


    if (isset($_POST["codigoCli"])) {
        $cEditar = new AjaxClientes();
        
        $cEditar -> ajaxEditarCliente();
         
    }
    if (isset($_POST["codCliente"])) {
        $cEliminar = new AjaxClientes();
        $cEliminar -> clienteEliminar = $_POST["codCliente"];
        $cEliminar -> ajaxEliminarCliente();
    }

    if (isset($_POST["valorValidar"])) {
        $validarProv = new AjaxClientes();
        $validarProv -> valorValidar=$_POST["valorValidar"];
        $validarProv -> itemValidar=$_POST["itemValidar"];
        $validarProv -> ajaxValidarProveedor();
    }




?>