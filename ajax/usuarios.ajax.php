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

    /* ====================================== 
    activar usuario
    ====================================== */
    public $codigUser;
    public $estadoUser;
    public function ajaxActivarUsuario(){
      $tabla="colaborador";
      $item1="estado";
      $valor1 = $this->estadoUser;
      $item2 = "colaborador_id";   
      $valor2= $this->codigUser;

      $respuesta = ModeloUsuario::MdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
      echo $respuesta;
    }
 
  }

  /* ----- Editar Usuario ----- */

  if (isset($_POST["codigUser"])) {
    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["codigUser"];
    $editar -> ajaxEditarUsuario();
  }

  /* ====================================== 
  activar usuario
  ====================================== */

  if (isset($_POST["activarUsuario"])) {
    $activarUser = new AjaxUsuarios();
    $activarUser -> codigUser = $_POST["activarId"];
    $activarUser -> estadoUser = $_POST["activarUsuario"];
    $activarUser -> ajaxActivarUsuario();
     
  }

   
 
?>