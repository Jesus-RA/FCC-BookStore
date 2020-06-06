<?php
    function conectarse(){
        $bd = new mysqli("localhost", "JesusRA", "jamon", "bookstore");
        return $bd;
    }

    function getCarreras(){
        $bd = conectarse();
        $query = "SELECT * FROM carrera";
        $result = $bd->query($query);
        if(!$result){
            die("Query error");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $carreras[$i] = [
                "idCarrera" => $row['idCarrera'],
                "carrera" => $row['carrera']
            ];
            $i++;
        }
        return $carreras;
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

    function getLibros($usuario){
        $bd = conectarse();
        $query = "SELECT e.estado AS Estado, a.area AS Area, l.* FROM libro l, area a, estado e WHERE l.propietario = $usuario AND (a.idArea = l.area AND e.idEstado = l.estado);";
        $result = $bd->query($query);
        if(!$result){
            die("Query Error Libros");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $libros[$i] = [
                "idLibro" => $row['idLibro'],
                "titulo" => $row['titulo'],
                "area" => $row['area'],
                "descripcion" => $row['descripcion'],
                "precio" => $row['precio'],
                "foto" => $row['foto'],
                "estado" => $row['estado'],
                "propietario" => $row['propietario'],
                "vendido" => $row['vendido'],
                "Estado" => $row['Estado'],
                "Area" => $row['Area']

            ];
            $i++;
        }
        return $libros;
    }

    function getAllBooks(){
        $bd = conectarse();
        $query = "SELECT e.estado AS Estado, a.area AS Area, l.* FROM libro l, area a, estado e WHERE l.vendido = 0 AND (a.idArea = l.area AND e.idEstado = l.estado);";
        $result = $bd->query($query);
        if(!$result){
            die("Query Error Libros");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $libros[$i] = [
                "idLibro" => $row['idLibro'],
                "titulo" => $row['titulo'],
                "area" => $row['area'],
                "descripcion" => $row['descripcion'],
                "precio" => $row['precio'],
                "foto" => $row['foto'],
                "estado" => $row['estado'],
                "propietario" => $row['propietario'],
                "vendido" => $row['vendido'],
                "Estado" => $row['Estado'],
                "Area" => $row['Area']

            ];
            $i++;
        }
        return $libros;
    }

    function getBooksByArea($area){
        $bd = conectarse();
        $query = "SELECT e.estado AS Estado, a.area AS Area, l.* FROM libro l, area a, estado e WHERE (l.area = $area AND l.vendido = 0) AND (a.idArea = l.area AND e.idEstado = l.estado);";
        $result = $bd->query($query);
        if(!$result){
            die("Query Error Libros");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $libros[$i] = [
                "idLibro" => $row['idLibro'],
                "titulo" => $row['titulo'],
                "area" => $row['area'],
                "descripcion" => $row['descripcion'],
                "precio" => $row['precio'],
                "foto" => $row['foto'],
                "estado" => $row['estado'],
                "propietario" => $row['propietario'],
                "vendido" => $row['vendido'],
                "Estado" => $row['Estado'],
                "Area" => $row['Area']

            ];
            $i++;
        }
        return $libros;
    }

    function getBookById($idLibro){
        $bd = conectarse();
        $query = "SELECT e.estado AS Estado, a.area AS Area, l.* FROM libro l, area a, estado e WHERE (l.idLibro = $idLibro) AND (a.idArea = l.area AND e.idEstado = l.estado);";
        $result = $bd->query($query);
        if(!$result){
            die("Query error");
        }
        $i = 0;
        while($row = $result->fetch_assoc()){
            $libros[$i] = [
                "idLibro" => $row['idLibro'],
                "titulo" => $row['titulo'],
                "area" => $row['area'],
                "descripcion" => $row['descripcion'],
                "precio" => $row['precio'],
                "foto" => $row['foto'],
                "estado" => $row['estado'],
                "propietario" => $row['propietario'],
                "vendido" => $row['vendido'],
                "Estado" => $row['Estado'],
                "Area" => $row['Area']

            ];
            $i++;
        }
        return $libros;
    }
?>