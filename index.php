<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categoria.controlador.php";
require_once "controladores/cargo.controlador.php";

require_once "modelos/plantilla.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categoria.modelo.php";
$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();


?>