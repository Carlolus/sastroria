<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php');  
    ?>
    <style>     
        body{
            background:#eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }
    </style>
    
        <div class="container-fluid">
            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted">
                        <i class="bi bi-arrow-left-square me-2"></i></a>Editar información</h2>
                </div>

                <!-- Main content -->
                <div class="row">
                    <!-- Left side -->
                    <div class="col-lg-8">
                        <!-- Basic information -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Cliente</h3>
                                <input type="hidden" name="id_rental">
                                <table class="table mb-0">
                                    <thead class="small text-uppercase bg-body text-muted">
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tableBodyClientes">
                                        <?php
                                            $db = conectar();
                                            $rental_id = $_SESSION['current_id_rental'];

                                            $sql = "SELECT suits.id, customers.id, price, initial_payment, loan_date, return_date, rentals.state 
                                            FROM rentals JOIN suits ON rentals.id_suit = suits.id JOIN customers ON rentals.id_customer = customers.id
                                            WHERE rentals.id = '$rental_id'";

                                            $result = mysqli_query($db, $sql);
                                            $arr=mysqli_fetch_array($result);

                                            $id_suit = $arr[0];
                                            $old_suit = $id_suit;
                                            $id_customer = $arr[1];
                                            $price = $arr[2];
                                            $initialP = $arr[3];
                                            $loan_date = $arr[4];
                                            $return_date = $arr[5];
                                            $state = $arr[6];


                                            $sql = "SELECT id, name FROM customers WHERE id = '$id_customer'";
                                            $result = mysqli_query($db, $sql);
                                            $arr=mysqli_fetch_array($result);
                                            echo 
                                            <<< HTML
                                                <tr class="align-middle">
                                                    <td>
                                                        $arr[0]
                                                    </td>
                                                    <td>$arr[1]</td>
                                                    <td><input type='radio' name='selectedCustomer'value='$arr[0]' checked disabled></td>
                                                </tr>
                                            HTML;
                             
                                        ?>                     
                                    </tbody>
                                </table> 
                            </div>         
                        </div>
                        <!-- Address -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4 mb-4">Seleccione el traje</h3>
                                <table class="table mb-0">
                                    <thead class="small text-uppercase bg-body text-muted">
                                        <tr>
                                            <th>Talla</th>
                                            <th>Detalles</th>
                                            <th>Imagen</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tableBodyTrajes">
                                        <?php
                                            $db = conectar();
                                            $sql = "SELECT id, size, details, img, state FROM suits WHERE id = '$id_suit'";
                                            $result = mysqli_query($db, $sql);
                                            $n = mysqli_num_rows($result);
                                            $arr=mysqli_fetch_array($result);
                                            echo 
                                            <<< HTML
                                                <tr class="align-middle">
                                                    <td>
                                                        $arr[1]
                                                    </td>
                                                    <td>$arr[2]</td>
                                                    <td><img src='$arr[3]' width='40'></td>
                                                    <td><input type='radio' name='selectedSuit' value='$arr[0]' checked disabled></td>
                                                </tr>
                                            HTML; 
                                                
                                        ?>                         
                                    </tbody>
                                </table> 
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4 mb-4">Estado</h3>
                                <?php 
                                if($state == "u"){
                                    echo "<h4 class='text-danger'>Sin finalizar</h4>";
                                }
                                else{
                                    echo "<h4 class='text-success'>Finalizado</h4>";
                                }               
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Fecha alquiler</h3>
                                <input disabled value='<?php echo date("Y-m-d", strtotime($loan_date)); ?>' required type="date" class="form-control" id="fecha" name="date" min="<?php echo date('Y-m-d'); ?>">
                                <br>
                                <h3 class="h6">Fecha máxima</h3>
                                <input disabled value='<?php echo date("Y-m-d", strtotime($return_date)); ?>' required type="date" class="form-control" id="fecha" name="return_date" min="<?php echo date('Y-m-d'); ?> ">
                            </div>           
                        </div>

                        <!-- Medidas Saco -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Pago</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Precio</label>
                                        <input value='<?php echo htmlspecialchars($price); ?>' required id="txtPrice" name="txtPrice" type="number" class="form-control" min="0" max="10000000" disabled >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Abono inicial</label>
                                        <input value='<?php echo htmlspecialchars($initialP); ?>' required id="txtInicialP" name="txtInitialP" type="number" class="form-control" min="0" max="10000000" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>