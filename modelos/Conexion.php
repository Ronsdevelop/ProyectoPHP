<?php
    class Conexion{
        static public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=bdpanaderialeos","root","HEAVYmetal2018");
            $link ->exec("set name utf8");
            return $link;
        }
    }
?>