<?php

 class ControladorCargos{

    static public function crtMostrarCargos(){
        $tabla = "cargo";
        $item = null;
        $valor = null;
        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
    }

 } 
?>