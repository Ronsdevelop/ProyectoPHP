<?php

require_once "Conexion.php"; 
class ModeloCliente{

      /* ----- Mostrar Proveedores ----- */
      static public function MdlMostrarClientes($tabla,$item,$valor){
        if ($item != null) {           

            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
            $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else {
            $stmt=Conexion::conectar()->prepare("CALL sp_listarClientes");              
            $stmt -> execute();
            return $stmt -> fetchAll();
            
        }
        
        $stmt -> close();
        $stmt = null;
       

    }




/* ----- REGISTRO DE USUARIO ----- */
    static public function MdlIngresarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("CALL sp_ingresaCliente(:rason,:direccion,:ruc,:alias,:referencia,:contacto,:nCelular,:email,:cumple,:tipocliente,:tipoIden,:sucursal,:colaborador)");
        $stmt->bindParam(":rason",$datos["rason"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":ruc",$datos["ruc"],PDO::PARAM_STR);
        $stmt->bindParam(":alias",$datos["alias"],PDO::PARAM_STR);
        $stmt->bindParam(":referencia",$datos["referencia"],PDO::PARAM_STR);
        $stmt->bindParam(":contacto",$datos["contacto"],PDO::PARAM_STR);
        $stmt->bindParam(":nCelular",$datos["nCelular"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR); 
        $stmt->bindParam(":cumple",$datos["cumpleanos"],PDO::PARAM_STR); 
        $stmt->bindParam(":tipocliente",$datos["tipoCliente"],PDO::PARAM_STR); 
        $stmt->bindParam(":tipoIden",$datos["tipoIdent"],PDO::PARAM_STR); 
        $stmt->bindParam(":sucursal",$datos["sucursal"],PDO::PARAM_STR); 
        $stmt->bindParam(":colaborador",$datos["colaborador"],PDO::PARAM_STR);

        if ($stmt->execute()) {
        return"ok";
        }else{
            return"error";
        }
        $stmt -> close();
        $stmt = null;


}

static public function MdlEditarCliente($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_razon = :rason , documento_identi = :ruc , direccion = :direccion , alias = :alias , referencia = :referencia , representante = :contacto , email = :email , nCelular = :nCelular , cumpleanos = :cumple , tipoCliente_id = :tipoCliente ,identificacion_id=:tipoIden , sucursal_id = :sucursal , colaborador_id = :colaborador  WHERE cliente_id = :codigo");       
    $stmt->bindParam(":rason",$datos["rason"],PDO::PARAM_STR);
    $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
    $stmt->bindParam(":ruc",$datos["ruc"],PDO::PARAM_STR);
    $stmt->bindParam(":alias",$datos["alias"],PDO::PARAM_STR);
    $stmt->bindParam(":referencia",$datos["referencia"],PDO::PARAM_STR);
    $stmt->bindParam(":contacto",$datos["contacto"],PDO::PARAM_STR);
    $stmt->bindParam(":nCelular",$datos["nCelular"],PDO::PARAM_STR);
    $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR); 
    $stmt->bindParam(":cumple",$datos["cumpleanos"],PDO::PARAM_STR); 
    $stmt->bindParam(":tipocliente",$datos["tipoCliente"],PDO::PARAM_STR); 
    $stmt->bindParam(":tipoIden",$datos["tipoIdent"],PDO::PARAM_STR); 
    $stmt->bindParam(":sucursal",$datos["sucursal"],PDO::PARAM_STR); 
    $stmt->bindParam(":colaborador",$datos["colaborador"],PDO::PARAM_STR);
    $stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);     

    if ($stmt->execute()) {
        return 'ok';
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

static public function MdlEliminaCliente($tabla,$item,$valor){
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