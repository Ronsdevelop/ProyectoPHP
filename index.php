<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categoria.controlador.php";

require_once "modelos/plantilla.modelos.php";
require_once "modelos/usuarios.modelos.php";
require_once "modelos/categoria.modelos.php";
$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();


?>