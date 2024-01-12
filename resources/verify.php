<?php
    session_start(); 
    include("connect.php");
    $db = conectar();
    $log = $_REQUEST["login"];
    $pass = $_REQUEST["password"];

    $sql = "SELECT * FROM users WHERE login = '$log' and password = md5('$pass')"; 

    $result = mysqli_query($db, $sql);

    $c = mysqli_num_rows($result);

    if ($c == 0){
        header("location: ../index.php");
    }
    else{
        $arr = mysqli_fetch_array($result);
        $_SESSION["xlog"]=$arr[0];
        $_SESSION["xname"]=$arr[2];
        $_SESSION["xpfp"]=$arr[3];
        header("location: ../main.php");
    }
    mysqli_close($db);

?>