<?php
    require_once "../controladores/usuarios.controlador.php ";
    require_once "../modelos/usuarios.modelo.php"; 

  class AjaxUsuarios{

    public $idUsuario;
    public function ajaxEditarUsuario(){

        $item = "colaborador_id";
        $valor = $this-> idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
        echo json_encode($respuesta);


    }

  }

  /* ----- Editar Usuario ----- */

  if (isset($_POST["codigUser"])) {
    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["codigUser"];
    $editar -> ajaxEditarUsuario();
  }
 
 
?>