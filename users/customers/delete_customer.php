<?php 
    include("../../resources/connect.php");
    $db = conectar();
    $id = $_GET['id'];

    $sql = "UPDATE customers SET state = 'h' WHERE id = $id";
    $result = mysqli_query($db, $sql);

    if($result){
        echo "Cliente eliminado con éxito";
    }
    else{
        echo "Se ha producido un error al eliminar al cliente";
    }
    mysqli_close($db);
?>