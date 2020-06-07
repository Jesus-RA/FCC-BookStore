<?php
    include('model/conexion.php');

    $matricula = $_POST['matricula'];
    $carrera = $_POST['carrera'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $libro = $_POST['libro'];

    $bd = conectarse();
    $query = "INSERT INTO compra (libro, matricula, carrera, telefono, email) VALUES ($libro, '$matricula', '$carrera', '$telefono', '$email')";
    $result = $bd->query($query);
    if(!$result){
        echo "0";
        die("Querry error: Ingresar compra");
    }else{
        echo "1";
    }


?>