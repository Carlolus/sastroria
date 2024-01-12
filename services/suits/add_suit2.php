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
        echo "<h6>Error al agregar el traje</h6>";  
    } else {
        echo "<h6> Traje agregado. </h6>";
    }
    mysqli_close($db);       
?>