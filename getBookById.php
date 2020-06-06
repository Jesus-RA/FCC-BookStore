<?php
    include('model/conexion.php');
    $idLibro = $_POST['idLibro'];
    if(!empty($idLibro)){
        $libros = getBookById($idLibro);
        $json = array();
        foreach($libros as $libro){
            $json[] = array(
                "idLibro" => $libro['idLibro'],
                "titulo" => $libro['titulo'],
                "area" => $libro['area'],
                "descripcion" => $libro['descripcion'],
                "precio" => $libro['precio'],
                "foto" => $libro['foto'],
                "estado" => $libro['estado'],
                "propietario" => $libro['propietario'],
                "vendido" => $libro['vendido'],
                "Estado" => $libro['Estado'],
                "Area" => $libro['Area']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>