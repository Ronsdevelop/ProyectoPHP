<?php
require_once "Conexion.php"; 
class ModeloProducto{

      /* ----- Mostrar Proveedores ----- */
      static public function MdlMostrarProductos($tabla,$item,$valor){
        if ($item != null) {           

            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
            $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
    }else {
            $stmt=Conexion::conectar()-> prepare("CALL sp_listarProductos");              
            $stmt -> execute();
            return $stmt -> fetchAll();
            
        }
        
        $stmt -> close();
        $stmt = null;
       

    }




/* ----- REGISTRO DE USUARIO ----- */
    static public function MdlIngresarProducto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("CALL sp_ingresaProducto(:nombre,:presentacion,:stock,:img,:precio,:descripcion,:idcategoria)");
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":presentacion",$datos["presentacion"],PDO::PARAM_STR);
        $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datos["precio"],PDO::PARAM_STR);
        $stmt->bindParam(":img",$datos["img"],PDO::PARAM_STR);
        $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":idcategoria",$datos["idcategoria"],PDO::PARAM_STR);
         

        if ($stmt->execute()) {
        return"Ingresado Correctamente";
        }else{
            return"error";
        }
        $stmt -> close();
        $stmt = null;


}

static public function MdlEditarProducto($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , presentacion = :presentacion , stock = :stock , imagen = :imagen , pVenta = :pVenta , descripcion = :descripcion , categoria_id = :categoria_id WHERE producto_id = :codigo");       
    $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(":presentacion",$datos["presentacion"],PDO::PARAM_STR);
    $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);  
    $stmt->bindParam(":imagen",$datos["img"],PDO::PARAM_STR);
    $stmt->bindParam(":pVenta",$datos["precio"],PDO::PARAM_STR);
    $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
    $stmt->bindParam(":categoria_id",$datos["idcategoria"],PDO::PARAM_STR);      
    $stmt->bindParam(":codigo",$datos["idproducto"],PDO::PARAM_STR);     

    if ($stmt->execute()) {
        return 'Se ha Editado Correctamente';
     }else{
         return "error";
     }
    $stmt -> close();
    $stmt = null;
}

static public function MdlActualizarCliente($tabla,$item1,$valor1,$item2,$valor2){
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

static public function MdlEliminaProducto($tabla,$item,$valor){
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

static public function MdlCodigoProducto(){

    $stmt = Conexion::conectar()-> prepare("SELECT fun_codigoProducto()");
    $stmt -> execute();
    return $stmt -> fetch();
    $stmt -> close();
    $stmt = null;

}
}
?>