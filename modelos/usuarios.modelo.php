<?php
    require_once "Conexion.php";
    class ModeloUsuario{

        /* ----- MOstrar Usuarios ----- */
        static public function MdlMostrarUsuarios($tabla,$item,$valor){
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
    static public function MdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,aPaterno,aMaterno,dni,direccion,nCelular,fIngreso,avatar,user,pass,email,cargo_id)values(:nombre,:aPaterno,:aMaterno,:dni,:direccion,:nCelular,:fIngreso,:avatar,:user,:pass,:email,:cargo_id)");
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":aPaterno",$datos["aPaterno"],PDO::PARAM_STR);
        $stmt->bindParam(":aMaterno",$datos["aMaterno"],PDO::PARAM_STR);
        $stmt->bindParam(":dni",$datos["dni"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":nCelular",$datos["nCelular"],PDO::PARAM_STR);
        $stmt->bindParam(":fIngreso",$datos["fIngreso"],PDO::PARAM_STR);
        $stmt->bindParam(":avatar",$datos["ruta"],PDO::PARAM_STR);
        $stmt->bindParam(":user",$datos["user"],PDO::PARAM_STR);
        $stmt->bindParam(":pass",$datos["pass"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
        $stmt->bindParam(":cargo_id",$datos["cargo_id"],PDO::PARAM_STR);

        if ($stmt->execute()) {
           return"ok";
        }else{
            return"error";
        }
        $stmt -> close();
        $stmt = null;


    }


   
}
?>