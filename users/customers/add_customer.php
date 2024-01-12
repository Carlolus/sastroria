<?php
    include("../../resources/connect.php");
    $db = conectar();

    // Creamos el cliente

    $id = $_POST['txtId'];
    $name = $_POST['txtName'];
    $phone = $_POST['txtPhone'];
    $adress = $_POST['txtAdress'];
    $email = $_POST['txtEmail'];

    $checkDuplicateSql = "SELECT id FROM customers WHERE id = '$id'";
    $checkDuplicateResult = mysqli_query($db, $checkDuplicateSql);

    if (mysqli_num_rows($checkDuplicateResult) > 0) {
        echo "La cédula '$id' ya se encuentra registrada en la base de datos, por favor ingrese una cédula única.";
    } else {
        $insertCustomerSql = "INSERT INTO customers VALUES ('$id','$name','$phone','$adress','$email','v')";
        $insertCustomerResult = mysqli_query($db, $insertCustomerSql);

        if (!$insertCustomerResult) {
            echo "Error al insertar el cliente en la base de datos.";
        } else {
            $largoP = $_POST['txtLargoP'];
            $tiroP = $_POST['txtTiroP'];
            $cinturaP = $_POST['txtCinturaP'];
            $baseP = $_POST['txtBaseP'];
            $piernaP = $_POST['txtPiernaP'];
            $rodillaP = $_POST['txtRodillaP'];
            $botaP = $_POST['txtBotaP'];

            $sql = "INSERT INTO trouser_measures VALUES ('$id', '$largoP', '$tiroP', '$cinturaP', '$baseP', '$piernaP', '$rodillaP', '$botaP')";
            $result = mysqli_query($db, $sql);


            $largoS = $_POST['txtLargoS'];
            $talleS = $_POST['txtTalleS'];
            $espaldaS = $_POST['txtEspaldaS'];
            $hombroS = $_POST['txtHombroS'];
            $pechoS = $_POST['txtPechoS'];
            $mangaS = $_POST['txtMangaS'];

            $sql = "INSERT INTO coat_measures VALUES ('$id', '$largoS', '$talleS', '$espaldaS', '$hombroS', '$pechoS', '$mangaS')";
            $result = mysqli_query($db, $sql);

            $largoV = $_POST['txtLargoV'];
            $talleV = $_POST['txtTalleV'];
            $pechoV = $_POST['txtPechoV'];

            $sql = "INSERT INTO vest_measures VALUES ('$id', '$largoV', '$talleV', '$pechoV')";
            $result = mysqli_query($db, $sql);
            echo "$name y su información registrados de manera exitosa.";
        }
    }

    mysqli_close($db);
?>