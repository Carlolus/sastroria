<?php 
    include("../../resources/connect.php");
    $db = conectar();

    $id = $_POST['confection_id'];
    $customer = $_POST['selectedCustomer'];
    $price = $_POST['txtPrice'];
    $initialPay = $_POST['txtInitialP'];
    $responsible = $_POST['selectedAdmin'];
    $stip_del_date = $_POST['date'];
    $fabric = $_POST['fabric_list'];
    $fabric_prov = $_POST['hiddenProv'];
    $fabric_quant = $_POST['txtQuantity'];
    $details = $_POST['txtDetails'];
    $title = $_POST['txtTitle'];
    $image = $_POST['image-url'];
    $fabric_price = $_POST['precioTela'];


    $sql = "UPDATE confections 
        SET 
            fabric_price = '$fabric_price',
            customer = '$customer', 
            labor_price = '$price', 
            initial_payment = '$initialPay', 
            responsible = '$responsible', 
            stip_del_date = '$stip_del_date',  
            provide_fabric = '$fabric_prov', 
            fabric = '$fabric', 
            fabric_quantity = '$fabric_quant', 
            details = '$details', 
            title = '$title', 
            ref_img = '$image'
        WHERE 
            id = '$id'";
    
    $result = mysqli_query($db, $sql);

    if(!$result){
        echo "Error al actualizar los datos.";
    }
    else{
        $sql = "SELECT name FROM customers WHERE id = '$customer'";
        $result = mysqli_query($db, $sql);
        $arr = mysqli_fetch_array($result);
  
        echo "Datos del pedido del señor(a) $arr[0] actualizados correctamente.";
    }
    mysqli_close($db);
?>