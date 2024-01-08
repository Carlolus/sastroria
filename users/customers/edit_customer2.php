<?php 
    include("../../resources/connect.php");
    $db = conectar();
    session_start();
    $oldId = $_SESSION['current_id'];
    // Obtenemos la información del cliente el cliente
    $newId = $_POST['txtId'];
    $name = $_POST['txtName'];
    $phone = $_POST['txtPhone'];
    $adress = $_POST['txtAdress'];
    $email = $_POST['txtEmail'];

    $sql = "UPDATE customers SET id = $newId, name = '$name', phone = '$phone', adress = '$adress', mail = '$email' WHERE id = '$oldId'";

    $result = mysqli_query($db, $sql);

    if(!$result){
        echo "La cédula '$id' ya se encuentra registrada en la base de datos, por favor ingrese una cédula única.";
    }
    else{
        // Datos a la tabla medida pantalones
        $largoP = $_POST['txtLargoP'];
        $tiroP = $_POST['txtTiroP'];
        $cinturaP = $_POST['txtCinturaP'];
        $baseP = $_POST['txtBaseP'];
        $piernaP = $_POST['txtPiernaP'];
        $rodillaP = $_POST['txtRodillaP'];
        $botaP = $_POST['txtBotaP'];

        $sql = "UPDATE trouser_measures SET largo = '$largoP', tiro ='$tiroP', cintura ='$cinturaP', base = '$baseP', pierna = '$piernaP', rodilla = '$rodillaP', bota = '$botaP' WHERE customer = '$newId'";
        $result = mysqli_query($db, $sql);

        // Datos a la tabla medida saco

        $largoS = $_POST['txtLargoS'];
        $talleS = $_POST['txtTalleS'];
        $espaldaS = $_POST['txtEspaldaS'];
        $hombroS = $_POST['txtHombroS'];
        $pechoS = $_POST['txtPechoS'];
        $mangaS = $_POST['txtMangaS'];

        $sql = "UPDATE coat_measures SET largo = '$largoS', talle = '$talleS', espalda = '$espaldaS', hombro = '$hombroS', pecho = '$pechoS', manga = '$mangaS' WHERE customer = '$newId'";
        $result = mysqli_query($db, $sql);
        // Datos a la tabla medida chaleco

        $largoV = $_POST['txtLargoV'];
        $talleV = $_POST['txtTalleV'];
        $pechoV = $_POST['txtPechoV'];

        $sql = "UPDATE vest_measures SET largo = '$largoV', talle = '$talleV', pecho = '$pechoV' WHERE customer = '$newId'";
        $result = mysqli_query($db, $sql);

        echo "$name y su información actualizados de manera exitosa.";
    }
    mysqli_close($db);
?>