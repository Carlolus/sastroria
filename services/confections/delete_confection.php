<?php 
    include("../../resources/connect.php");
    $db = conectar();
    $id_confection = $_POST['confection_id'];

    $sql = "DELETE FROM confections WHERE id = '$id_confection'";
    $result = mysqli_query($db, $sql);

    mysqli_close($db);
?>