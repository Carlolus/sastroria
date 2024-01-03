<?php
    function conectar(){
        $db = mysqli_connect("localhost","root","","sastreriadb");
        if (!$db){
            echo "<h4>Error al conectarse a la Base de Datos</h4>";
            return NULL;
        }
        return $db;
    }
?>