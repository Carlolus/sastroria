<?php 
    include("../../resources/connect.php");
    session_start();
    $obj = $_SESSION['xlog'];
    $nPass = $_REQUEST['newPassword1'];
    $oPass = $_REQUEST['actualPassword'];
    $db = conectar();
    $sql = "UPDATE users SET password = MD5('$nPass') WHERE login = '$obj' AND password = MD5('$oPass')";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        echo "<h3>Error:</h3>";
        echo "<p>Contraseña incorrecta</p>";
    }
    else{
        echo "<h3>Exito:</h3>";
        echo "<p>Contraseña actualizada con éxito</p>";
    }
    
    mysqli_close($db);
?>

