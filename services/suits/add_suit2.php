<?php 

    include("../../resources/connect.php");
    $db = conectar();

    $talla = $_POST['txtsize'];
    $details = $_POST['txtdetails'];
    $image = $_POST['image-url'];
    $state = $_POST['hiddenState'];

    $sql = "INSERT INTO suits (size, details, img, state) VALUES ('$talla','$details','$image','$state')";
    $result = mysqli_query($db, $sql);
    if (!$result) {    
        echo "<h3>Error al agregar el traje</h3>";  
    } else {
        echo "<h3> Traje agregado. </h3>";
    }
    mysqli_close($db);       
?>