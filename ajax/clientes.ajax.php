<?php
    require_once "../controladores/cliente.controlador.php ";
    require_once "../modelos/clientes.modelo.php"; 

    class AjaxClientes{

        public $codClienteEditar;
        public function ajaxEditarCliente(){
            $tabla ="cliente";
            $item ="cliente_id";
            $valor = $this-> codClienteEditar;
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


    if (isset($_POST["codigoEditar"])) {
        $cEditar = new AjaxClientes();
        $cEditar -> codClienteEditar = $_POST["codigoEditar"];
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
        $validarProv -> ajaxValidarCliente();
    }




?>