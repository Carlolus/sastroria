<?php
    session_start();
    $id = $_POST['obj'];
    $_SESSION['current_id'] = $id;
    if (isset($_POST["submitView"])) {
        header("Location: view_info.php");
        exit();
    } elseif (isset($_POST["submitModificar"])) {
        header("Location: edit_customer.php");
        exit();
    }
?>