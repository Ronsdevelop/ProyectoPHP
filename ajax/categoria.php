<?php
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

$categoria_id= isset($_POST["categoria_id"])? limpiarCadena($_POST["categoria_id"]):"";
$categoria= isset($_POST["categoria"])? limpiarCadena($_POST["categoria"]):"";
$descripcion= isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]) {
    case 'guardaryeditar':  
        
        if (empty($idcategoria)) {
            $rspta=$categoria -> insertar($nombre,$descripcion);
            echo $rspta ?"Categoría registrada":"Categoría no se pudo registrar";
        }else {
            $rspta=$categoria -> insertar($idcategoria,$nombre,$descripcion);
            echo $rspta ?"Categoría actualizada":"Categoría no se pudo actualizar";
        }
        break;
    case 'desactivar':
        $rspta=$categoria -> desactivar($idcategoria);
        echo $rspta ?"Categoría Desactivada":"Categoría no se pudo desactivar";
    break;
    case 'activar':
        $rspta=$categoria -> activar($idcategoria);
        echo $rspta ?"Categoría Activada":"Categoría no se pudo Activar";
    break;
    case 'mostrar':
        $rspta=$categoria -> mostrar($idcategoria);
        //Codificar el resultado ulizando JSON
        echo  json_encode($rspta);

    break;
    case 'listar':
        $rspta =$categoria -> listado();
        //vmos a declara un array
        $data = Array();
        while ($reg =$rspta ->fetch_object()) {
            $data[]=array(
                "0"=>$reg -> categoria_id,
                "1"=>$reg -> categoria,
                "2"=>$reg -> descripcion,
                "3"=>$reg -> seccion_id
                
            );
        }
        $results = array(
            "sEcho"=>1,// Información para datatable
            "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
            "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
            "aaData"=>$data); 
            echo json_encode($results);      
    break;   
    
}

?>