<?php

require_once "Conexion.php"; 
class ModeloProveedor{

      /* ----- Mostrar Proveedores ----- */
      static public function MdlMostrarProveedores($tabla,$item,$valor){
        if ($item != null) {

            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else {
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");              
            $stmt -> execute();
            return $stmt -> fetchAll();
            
        }
        
        $stmt -> close();
        $stmt = null;
       

    }




/* ----- REGISTRO DE USUARIO ----- */
static public function MdlIngresarProveedor($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("CALL sp_ingresaProveedor(:rason,:ruc,:direccion,:contacto,:email,:nCelular,:nFono,:referencia)");
    $stmt->bindParam(":rason",$datos["rason"],PDO::PARAM_STR);
    $stmt->bindParam(":ruc",$datos["ruc"],PDO::PARAM_STR);
    $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
    $stmt->bindParam(":contacto",$datos["contacto"],PDO::PARAM_STR);
    $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
    $stmt->bindParam(":nCelular",$datos["nCelular"],PDO::PARAM_STR);
    $stmt->bindParam(":nFono",$datos["nFono"],PDO::PARAM_STR);
    $stmt->bindParam(":referencia",$datos["referencia"],PDO::PARAM_STR); 

    if ($stmt->execute()) {
       return"ok";
    }else{
        return"error";
    }
    $stmt -> close();
    $stmt = null;


}

static public function MdlEditarProveedor($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET rason = :rason, ruc = :ruc, direccion = :direccion, contacto = :contacto, email = :email, nCelular = :nCelular, nFono = :nFono, referencia = :referencia  WHERE proveedor_id = :codigo");       

    $stmt->bindParam(":rason",$datos["rason"],PDO::PARAM_STR);
    $stmt->bindParam(":ruc",$datos["ruc"],PDO::PARAM_STR);
    $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
    $stmt->bindParam(":contacto",$datos["contacto"],PDO::PARAM_STR);
    $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
    $stmt->bindParam(":nCelular",$datos["nCelular"],PDO::PARAM_STR);
    $stmt->bindParam(":nFono",$datos["nFono"],PDO::PARAM_STR);
    $stmt->bindParam(":referencia",$datos["referencia"],PDO::PARAM_STR); 
    $stmt->bindParam(":codigo",$datos["proveedor_id"],PDO::PARAM_STR); 


     

    if ($stmt->execute()) {
        return 'ok';
     }else{
         return "error";
     }
    $stmt -> close();
    $stmt = null;
}

static public function MdlActualizarProveedor($tabla,$item1,$valor1,$item2,$valor2){
    $stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2=:$item2");
    $stmt->bindParam(":".$item1,$valor1,PDO::PARAM_STR);
    $stmt->bindParam(":".$item2,$valor2,PDO::PARAM_STR);
    if ($stmt->execute()) {
        return"ok";
     }else{
         return "error";
     }
     $stmt -> close();
     $stmt = null;

}

static public function MdlEliminaProveedor($tabla,$item,$valor){
    $stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE $item=:$item");
    $stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
    if ($stmt ->execute()) {
        return "ok";
    }else{
        return"error";
    }
    $stmt -> close();
     $stmt = null;

}



}
?>