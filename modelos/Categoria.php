<?php
//Incluímos incialmente la conexión a la base de datos

require "../config/Conexion.php";

Class Categoria{
    //Implementamos nuestro constructor
    public function __construct(){

    }
    //Metodo para insertar registros
    public function insertar($categoria,$descripcion,$estado,$seccion){

        $sql = "CALL sp_ingresaCategoria('$categoria','$descripcion','$estado','$seccion')  ";
        return ejecutarConsulta($sql);
    }
    //Metodo para editar para los registros
    public function editar($idcategoria,$nombre,$descripcion){
        $sql = "UPDATE categoria SET nombre ='$nombre',descripcion='$descripcion' WHERE idcategoria ='$idcategoria'";
        return ejecutarConsulta($sql);
    }
    //Método para desactivar categorías
    public function desactivar($idcategoria){
        $sql = "UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
      //Método para activar categorías
      public function activar($idcategoria){
        $sql = "UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
  //Método para mostrar los datos de un registro a modificar
  public function mostrar($idcategoria){
      $sql = "SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
      return ejecutarConsultaSimpleFila($sql);
  }
  //Método para listar registros
  public function listado(){
      $sql = "SELECT * FROM Categoria";
      return ejecutarConsulta($sql);
  }

}


?>  