<?php 
    include("../../resources/connect.php");
    $db = conectar();
    $id_rental = $_POST['rental_id'];
    $sql = "UPDATE suits SET state = 'a' WHERE id = (SELECT suits.id FROM rentals JOIN suits ON rentals.id_suit = suits.id  WHERE rentals.id = '$id_rental')";
    $result = mysqli_query($db, $sql);

    $sql = "UPDATE rentals SET visible = 'n' WHERE id = '$id_rental'";
    $result = mysqli_query($db, $sql);

    mysqli_close($db);
?>