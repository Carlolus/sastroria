<?php 
    include("../../resources/connect.php");
    session_start();

    if (isset($_POST['newPassword1']) && isset($_POST['actualPassword'])) {
        $obj = $_SESSION['xlog'];
        $nPass = $_POST['newPassword1'];
        $oPass = $_POST['actualPassword'];
        $db = conectar();
        $sql = "UPDATE users SET password = MD5('$nPass') WHERE login = '$obj' AND password = MD5('$oPass')";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            echo "<p>Contraseña incorrecta</p>";
        } else {
            echo "<p>Contraseña actualizada con éxito</p>";
        }
        mysqli_close($db);
    }  
?>

