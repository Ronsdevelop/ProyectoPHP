<?php
    class Conexion{
        public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=bdpanaderialeos","root","HEAVYmetal2018");
            $link ->exec("set name utf8");
            return $link;
        }
    }
?>