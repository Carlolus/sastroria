<?php 
    include("../../resources/connect.php");
    $db = conectar();

    $customer = $_POST['selectedCustomer'];
    $suit = $_POST['selectedSuit'];
    $price = $_POST['txtPrice'];
    $initialPay = $_POST['txtInitialP'];
    $returnDate = $_POST['date'];
    $actualDate = date('Y-m-d');
    $state = "u";

    $sql = "INSERT INTO rentals (id_suit, id_customer, price, initial_payment, loan_date, return_date, state) 
    VALUES ('$suit','$customer','$price','$initialPay','$actualDate','$returnDate','$state')";

    $result = mysqli_query($db, $sql);

    if(!$result){
        echo "Error al prestar.";
    }
    else{
        $sql = "UPDATE suits SET state = 'n' WHERE id = '$suit'";
        $result = mysqli_query($db, $sql);
        echo "Alquilado con éxito al cliente de cédula $customer.";
    }
    mysqli_close($db);
?>