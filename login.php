<?php
    include('model/conexion.php');

    if($_POST['email'] && $_POST['password']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $bd = conectarse();
        $query = "SELECT idUsuario, nombre FROM usuario WHERE email = '$email'";
        $result = $bd->query($query);
        $row = $result->fetch_assoc();
        if(!$result){
            die("Usuario no registrado");
        }
        
        if($result->num_rows > 0){
            $query = "SELECT idUsuario, nombre FROM usuario WHERE password = '$password'";
            $result = $bd->query($query);
            $row = $result->fetch_assoc();
            if(!$result){
                die("Contraseña incorrecta");
            }
            if($result->num_rows > 0){
                session_start();
                $_SESSION['usuario'] = $row['nombre'];
                $_SESSION['idUsuario'] = $row['idUsuario'];
                echo "1";
            }else{
                echo "Contraseña incorrecta";
            }

        }else{
            echo "Usuario incorrecto";
        }
    }
?>