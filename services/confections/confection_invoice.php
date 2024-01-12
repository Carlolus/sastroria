<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <style>
        body{
            background-color: #000;
            font-family: 'Roboto', sans-serif;
            background:#eee;
        }

        .padding{

            padding: 2rem !important;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2;
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium';
        }

        .text-dark {
            color: #3d405c !important;
        }

    </style>
    <?php 
        include('../../resources/menu.php'); 
        $db = conectar();
        $confection_id = $_SESSION['current_id_confection'];
        $sql = "SELECT id, customer, title, provide_fabric, labor_price, initial_payment, fabric, details, ref_img
        , reception_date, stip_del_date, delivery_date, state, fabric_quantity, responsible, fabric_price FROM confections WHERE id = '$confection_id'";
        $result = mysqli_query($db, $sql);
        $infoConfection=mysqli_fetch_array($result); 
        

        // Cliente
        $id_customer = $infoConfection[1];
        $sql = "SELECT name, phone, adress, mail FROM  customers WHERE id = '$id_customer'";
        $result = mysqli_query($db, $sql);
        $infoCustomer=mysqli_fetch_array($result);
    ?>


    
    
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-header p-4">
                        <h2 class="mb-0">Sastreria Sur</h2>
                        <div class="float-right">
                            <h3 class="mb-0">Factura #FC<?php echo $confection_id; ?></h3>
                            <?php echo date('d-m-Y'); ?>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">De:</h5>
                        <h3 class="text-dark mb-1">Sastreria Sur</h3>
                        <div>Nariño - Nariño, Colombia</div>
                        <div>Calle 3 Carrera 4-16</div>
                        <div>Email: sastreriasur@gmail.com</div>
                        <div>Teléfono: 3218208368</div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">Para:</h5>
                        <h3 class="text-dark mb-1"><?php echo $infoCustomer[0];?></h3>
                        <div>CC: <?php echo $id_customer;?> </div>
                        <div>Dirección: <?php echo $infoCustomer[2];?></div>
                        <div>Email: <?php echo $infoCustomer[3];?></div>
                        <div>Teléfono: <?php echo $infoCustomer[1];?></div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Elemento</th>
                                <th>Descripción</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">1</td>
                                <td class="left strong"><?php echo $infoConfection[2];?></td>
                                <td class="left">Valor confección</td>
                                <td class="right"><?php echo "$" . number_format($infoConfection[4], 0, ',', '.');?></td>
                            </tr>
                            <tr>
                                <td class="center">2</td>
                                <td class="left">Tela</td>
                                <td class="left">
                                    <?php 
                                        if($infoConfection[3] == "n"){
                                            echo "$infoConfection[6]". " (".$infoConfection[13]." cm)";
                                        }
                                        else{
                                            echo "$infoConfection[6]". " (".$infoConfection[13]." cm) (Suministrada por el cliente)";
                                        }
                                    ?> </td>
                                <td class="right"><?php echo "$" . number_format($infoConfection[15], 0, ',', '.');?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>              
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark"><?php echo "$" . number_format(intval($infoConfection[4] + $infoConfection[15]), 0, ',', '.');?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">Sastreria Sur, Nariño - Nariño</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>