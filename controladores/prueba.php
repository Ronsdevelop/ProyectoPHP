<?php
require_once "../modelos/usuarios.modelo.php";

  $tabla = "colaborador";
  $item=null;
  $valor=null;
  $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
  echo json_encode($respuesta);
?>