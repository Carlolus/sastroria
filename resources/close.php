<?php
    session_start();
    session_destroy();  //hasta aqui existirian las variables xlogin
    header("Location: ../index.php");
?>