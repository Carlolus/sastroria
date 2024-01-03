<?php
    session_start(); //acceso a las variables de sesion
    include("connect.php");
    $db = conectar();
    $log = $_REQUEST["txtlog"];
    $pass = $_REQUEST["txtpass"];

    $sql = "SELECT * FROM users WHERE login = '$log' and clave = md5('$pass')"; // la funcion md5 encripa la clase

    $result = mysqli_query($bd, $sql);

    $c = mysqli_num_rows($result);

    if ($c == 0){
        //echo "Usuario no existe";
        header("location: ../index.php");
    }
    else{
        $arr = mysqli_fetch_array($datos);
        $_SESSION["xlog"]=$arr[0];
        $_SESSION["xname"]=$arr[2];
        header("location: ../main.php");
        //echo "Bienvenido $arr[2]";
        
    }
    mysqli_close($db);

?>