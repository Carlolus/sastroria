<?php 
    include("../../resources/connect.php");
    $db = conectar();
    $id = $_POST['customer_id'];
    $sql = "UPDATE customers SET state = 'h' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    echo "Cliente eliminado con éxito";
    mysqli_close($db);
?>