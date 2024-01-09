<?php
    include('../../resources/connect.php');
    $id_rental = $_POST['rental_id_fin'];
    $db = conectar();

    $sql = "UPDATE rentals SET state = 'f' WHERE id = '$id_rental'";
    $result = mysqli_query($db, $sql);

    $sql = "UPDATE suits SET state = 'a' WHERE suits.id = (SELECT suits.id FROM suits JOIN rentals ON suits.id = rentals.id_suit WHERE rentals.id = '$id_rental')";
    $result = mysqli_query($db, $sql);

    mysqli_close($db);
?>