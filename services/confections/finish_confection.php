<?php
    include('../../resources/connect.php');
    $id_confection = $_POST['confection_id_fin'];
    $db = conectar();

    $sql = "UPDATE confections SET state = 'f' WHERE id = '$id_confection'";
    $result = mysqli_query($db, $sql);

    mysqli_close($db);
?>