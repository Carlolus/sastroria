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
            echo "<h3>Error:</h3>";
            echo "<p>Contraseña incorrecta</p>";
        } else {
            echo "<h3>Éxito:</h3>";
            echo "<p>Contraseña actualizada con éxito</p>";
        }
        mysqli_close($db);
    } else {
        // Manejar el caso en que las claves no están presentes
        echo "<h3>Error:</h3>";
        echo "<p>Parámetros de contraseña no proporcionados correctamente</p>";
    }   
    
?>

