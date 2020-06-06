<?php
    include('model/conexion.php');
    session_start();

    $titulo = $_POST['titulo'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $fotoName = $_FILES['foto']['name'];
    $fotoType = $_FILES['foto']['type'];
    $estado = $_POST['estado'];
    $propietario = $_SESSION['idUsuario'];
    echo $propietario;

    echo " Titulo: $titulo <br> Area: $area <br> Descripción: $descripcion <br> Precio: $precio <br> Nombre de Foto: $fotoName <br> Tipo de foto: $fotoType <br> Estado: $estado <br>";
    $ruta = "img/".$fotoName;
    copy($_FILES['foto']['tmp_name'], $ruta);

    $bd = conectarse();
    $query = "INSERT INTO libro (titulo, area, descripcion, precio, foto, estado, propietario, vendido) VALUES ('$titulo', '$area', '$descripcion', '$precio',  '$fotoName', '$estado', '$propietario', 0)";
    $result = $bd->query($query);
    if(!$result){
        die("Error al agregar libro");
    }else{
        header("Location: index.php");
    }

?>