<?php 
    include("../../resources/connect.php");
    $db = conectar();

    $id = $_POST['rental_id'];
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
        $sql = "SELECT name FROM customers WHERE id = '$customer'";
        $result = mysqli_query($db, $sql);
        $arr = mysqli_fetch_array($result);

        if($old_suit != $suit){
            $sql = "UPDATE suits SET state = 'a' WHERE id = '$old_suit'";
            $result = mysqli_query($db, $sql);

            $sql = "UPDATE suits SET state = 'n' WHERE id = '$suit'";
            $result = mysqli_query($db, $sql);
            echo "Préstamo del cliente $arr[0] actualizado con éxito.";
        }
        else{
            echo "Préstamo del cliente $arr[0] actualizado con éxito.";
        }
       
    }
    mysqli_close($db);
?>