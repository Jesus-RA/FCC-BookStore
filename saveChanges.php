<?php
    include('model/conexion.php');

    $titulo = $_POST['titulo'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $fotoName = $_FILES['foto']['name'];
    $estado = $_POST['estado'];
    $libro = $_POST['bookToEdit'];
    // $propietario = $_SESSION['idUsuario'];
    // echo $propietario;
    $ruta = "img/".$fotoName;
    copy($_FILES['foto']['tmp_name'], $ruta);

    // echo " Titulo: $titulo <br> Area: $area <br> Descripción: $descripcion <br> Precio: $precio <br> Nombre de Foto: $fotoName <br> Tipo de foto: $fotoType <br> Estado: $estado <br>";
    if(!empty($fotoName)){
        $query = "UPDATE libro SET titulo = '$titulo', area = '$area', descripcion = '$descripcion', precio = '$precio', foto = '$fotoName',estado = '$estado' WHERE idLibro = $libro";
    }else{
        $query = "UPDATE libro SET titulo = '$titulo', area = '$area', descripcion = '$descripcion', precio = '$precio', estado = '$estado' WHERE idLibro = $libro";
    }
    
    $bd = conectarse();
    $result = $bd->query($query);
    if(!$result){
        die("Error al agregar libro");
    }else{
        header("Location: index.php");
    }
?>