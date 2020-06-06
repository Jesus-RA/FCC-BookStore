<?php
    include ('keys.php');
    include ('model/conexion.php');
    if($_POST['google-response-token']){
        {
            $googleToken = $_POST['google-response-token'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$googleToken}");
            $response = json_decode($response);
            $response = (array) $response;

            if($response['success'] && ($response['score'] && $response['score'] > 0.5)){
                // echo "<div class='alert alert-success'> Validación correcta! :) </div>";
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $bd = conectarse();
                $query = "INSERT INTO usuario (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
                $result = $bd->query($query);
                if(!$result){
                    die("Error al registrar usuario").$result->error();
                }
                echo "1";

            }else{
                echo "<div class='alert alert-danger'> Validación incorrecta! :( Eres un robot! </div>";
                
            }

        }
    }
?>