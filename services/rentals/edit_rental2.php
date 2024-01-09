<?php 
    include("../../resources/connect.php");
    $db = conectar();

    $id = $_POST['id_rental'];
    $old_suit = $_POST['old_suit'];


    $customer = $_POST['selectedCustomer'];
    $suit = $_POST['selectedSuit'];
    $price = $_POST['txtPrice'];
    $initialPay = $_POST['txtInitialP'];
    $returnDate = $_POST['return_date'];
    $actualDate = $_POST['date'];

    $sql = "UPDATE rentals SET id_suit = $suit, id_customer = '$customer', price = '$price', initial_payment = '$initialPay', loan_date = '$actualDate', return_date = '$returnDate' 
    WHERE id = '$id'";
    $result = mysqli_query($db, $sql);

    if(!$result){
        echo "Error al prestar.";
    }
    else{
        if($old_suit != $suit){
            $sql = "UPDATE suits SET state = 'a' WHERE id = '$old_suit'";
            $result = mysqli_query($db, $sql);

            $sql = "UPDATE suits SET state = 'n' WHERE id = '$suit'";
            $result = mysqli_query($db, $sql);
            echo "Alquilado con éxito al cliente de cédula $customer.";
        }
        else{
            echo "Alquilado con éxito al cliente de cédula $customer.";
        }
       
    }
    mysqli_close($db);
?>