<?php 
    include("../../resources/connect.php");
    $db = conectar();

    $customer = $_POST['selectedCustomer'];
    $price = $_POST['txtPrice'];
    $initialPay = $_POST['txtInitialP'];
    $responsible = $_POST['selectedAdmin'];
    $stip_del_date = $_POST['date'];
    $received_date = date('Y-m-d');
    $delivery_date = null;
    $fabric = $_POST['fabric_list'];
    $fabric_prov = $_POST['hiddenProv'];
    $fabric_quant = $_POST['txtQuantity'];
    $fabric_price = $_POST['precioTela'];
    $details = $_POST['txtDetails'];
    $title = $_POST['txtTitle'];
    $image = $_POST['image-url'];
    $state = "u";


    $sql = "INSERT INTO confections (customer, title, provide_fabric, labor_price, fabric_price, initial_payment, fabric, details, ref_img
    ,reception_date , stip_del_date, delivery_date, state, fabric_quantity, responsible ) 
    VALUES ('$customer', '$title', '$fabric_prov', '$price','$fabric_price', '$initialPay', '$fabric', '$details', '$image'
    ,'$received_date', '$stip_del_date', '$delivery_date', '$state', '$fabric_quant', '$responsible')";

    $result = mysqli_query($db, $sql);

    if(!$result){
        echo "Error al añadir la confección.";
    }
    else{
        $sql = "SELECT name FROM customers WHERE id = '$customer'";
        $result = mysqli_query($db, $sql);
        $arr = mysqli_fetch_array($result);
  
        echo "Pedido para el cliente $arr[0] creado con éxito.";
    }
    mysqli_close($db);
?>