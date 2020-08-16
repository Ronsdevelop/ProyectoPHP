<?php
    require_once "../controladores/usuarios.controlador.php ";
    require_once "../modelos/usuarios.modelo.php"; 

  class AjaxUsuarios{

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item = "colaborador_id";
        $tabla = "colaborador";
        $valor = $this-> idUsuario;
        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
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

      /* ----- VALIDAR PARA NO REPETIR USURIO ----- */

      public $validarUsuario;
      public function ajaxValidarUsuario(){
        $item = "user";
        $tabla = "colaborador";
        $valor = $this-> validarUsuario;
        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
        echo json_encode($respuesta);
      }

      /* ----- ELIMINAR USUARIO ----- */

      public $codigoEliminar;
      public $fotoUser;
      public $user;

      public function ajaxEliminarUsuario(){
        
        $tabla = "colaborador";
        $item = "colaborador_id";
        $valor = $this->codigoEliminar;
        $usuario = $this->user;
        $fotousario = $this->fotoUser;
 
        $respuesta = ModeloUsuario::MdlEliminaUsuario($tabla,$item,$valor);
        if ($respuesta != "error") {                  
          unlink('../'.$fotousario);
          rmdir('../vistas/img/usuarios/'.$usuario);                
        }
  
        echo  json_encode($respuesta);
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

  /* ----- VALIDAR PARA NO REPETIR USURIO ----- */

  if (isset($_POST["validarUsuario"])) {
    $validarUsuario = new AjaxUsuarios();
    $validarUsuario -> validarUsuario = $_POST["validarUsuario"]; 
    $validarUsuario -> ajaxValidarUsuario();
     
  }

  /* ----- ELIMINAR USUARIO ----- */   
 if (isset($_POST["codUsuario"])) {
    $codigoEliminar = new ajaxUsuarios();
    $codigoEliminar -> codigoEliminar = $_POST["codUsuario"];
    $codigoEliminar -> user = $_POST["user"];
    $codigoEliminar -> fotoUser = $_POST["fotoUser"];
    $codigoEliminar -> ajaxEliminarUsuario();
 }
?>