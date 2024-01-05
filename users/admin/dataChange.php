<?php 

    include("../../resources/connect.php");
    $db = conectar();
    session_start();
    $obj = $_SESSION['xlog'];
    $nLogin = $_POST['login'];
    $nName = $_POST['name'];
    $nPhone = $_POST['phone'];
    $nImage = $_POST['image-url'];
    $sql = "UPDATE users SET login = '$nLogin', name = '$nName', phone = '$nPhone', image = '$nImage' WHERE login = '$obj'";
    $result = mysqli_query($db, $sql);


    if (!$result) {    
        echo "<h3>Error:</h3>";
        echo "<p>La clave ya se encuentra registrada</p>";  
    } else {
        if($obj != $nLogin){
            echo "<p>Datos actualizados con éxito</p>";
            $_SESSION['xlog'] = $nLogin;
        }
        else{
            echo "<p>Datos actualizados con éxito</p>";
        }
    }

    mysqli_close($db);       
?>