<?php

 class ControladorCargos{

    static public function crtMostrarCargos($item,$valor){
        $tabla = "cargo";
        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
    }

 } 
?>