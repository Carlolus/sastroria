<?php
    session_start();
    $id = $_POST['obj'];
    $_SESSION['current_id_rental'] = $id;
    if (isset($_POST["submitView"])) {
        header("Location: view_info.php");
        exit();
    } elseif (isset($_POST["submitModificar"])) {
        header("Location: edit_rental.php");
        exit();
    }
?>