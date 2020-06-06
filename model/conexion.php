<?php
    function conectarse(){
        $bd = new mysqli("localhost", "JesusRA", "jamon", "bookstore");
        return $bd;
    }

    function getAreas(){
        $bd = conectarse();
        $query = "SELECT * FROM area";
        $result = $bd->query($query);
        if(!$result){
            die("Query error");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $areas[$i] = [
                "idArea" => $row['idArea'],
                "area" => $row['area']
            ];
            $i++;
        }
        return $areas;
    }

    function getEstados(){
        $bd = conectarse();
        $query = "SELECT * FROM estado";
        $result = $bd->query($query);
        if(!$result){
            die("Query error");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $estados[$i] = [
                "idEstado" => $row['idEstado'],
                "estado" => $row['estado']
            ];
            $i++;
        }
        return $estados;
    }
?>