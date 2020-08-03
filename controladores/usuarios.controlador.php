<?php
    class ControladorUsuarios{

        /* ----- Ingreso de Usuarios ----- */   
        public function ctrIngresoUsuario(){
            if (isset($_POST["ingUsuario"])) {
               if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"])&&preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"])) {
                   $tabla = "colaborador";
                   $item = "user";
                   $valor = $_POST["ingUsuario"];

                   $respuesta = ModeloUsuario::MldMostrarUsuarios($tabla,$item,$valor);
                   var_dump($respuesta);
           
               }
            }

        }


    }
?>