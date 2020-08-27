<?php

 class ControladorCategoria{

    static public function crtMostrarCategoria(){
        $tabla = "categoria";
        $item = null;
        $valor = null;
        $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
    }

 } 
?>