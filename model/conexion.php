<?php
    function conectarse(){
        $bd = new mysqli("localhost", "JesusRA", "jamon", "bookstore");
        return $bd;
    }
?>