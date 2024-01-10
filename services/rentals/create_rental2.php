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

        $sql = "SELECT name FROM customers WHERE id = '$customer'";
        $result = mysqli_query($db, $sql);
        $arr = mysqli_fetch_array($result);

        
        echo "Alquilado con éxito al cliente de nombre $arr[0].";
    }
    mysqli_close($db);
?>