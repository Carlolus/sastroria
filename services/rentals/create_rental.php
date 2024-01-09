<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php'); ?>
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
    
    <form action="create_rental2.php" id = "frmCreateRental" method = "post">
        <div class="container-fluid">
            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted">
                        <i class="bi bi-arrow-left-square me-2"></i></a>Nuevo alquiler</h2>
                    <div class="hstack gap-3">
                        <a href="list_rentals.php" class="btn btn-light btn-sm btn-icon-text">
                            <i class="bi bi-x"></i>
                            <span class="text">Cancelar</span>
                        </a>                 
                        <button id = "btnSave" class="btn btn-dark btn-sm btn-icon-text" type="submit"><i class="bi bi-save"></i> <span class="text">Guardar</span></button>
                    </div>
                </div>

                <!-- Main content -->
                <div class="row">
                    <!-- Left side -->
                    <div class="col-lg-8">
                        <!-- Basic information -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Cliente</h3>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="searchInputClientes" placeholder="Buscar">
                                </div>
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
                                            $sql = "SELECT id, name FROM customers WHERE state = 'v'";
                                            $result = mysqli_query($db, $sql);
                                            $n = mysqli_num_rows($result);
                                            if($n > 0){
                                                while ($arr=mysqli_fetch_array($result)) {      
                                                    echo 
                                                    <<< HTML
                                                        <tr class="align-middle">
                                                            <td>
                                                                $arr[0]
                                                            </td>
                                                            <td>$arr[1]</td>
                                                            <td><input type='radio' name='selectedCustomer'value='$arr[0]'></td>
                                                        </tr>
                                                    HTML; 
                                                }
                                                mysqli_close($db);
                                            }
                                            else{
                                                echo '<tr><td colspan="4">No hay clientes registrados</td></tr>';
                                            }                               
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
                                            $sql = "SELECT id, size, details, img, state FROM suits WHERE state = 'a'";
                                            $result = mysqli_query($db, $sql);
                                            $n = mysqli_num_rows($result);
                                            if($n > 0){
                                                while ($arr=mysqli_fetch_array($result)) {      
                                                    echo 
                                                    <<< HTML
                                                        <tr class="align-middle">
                                                            <td>
                                                                $arr[1]
                                                            </td>
                                                            <td>$arr[2]</td>
                                                            <td><img src='$arr[3]' width='40'></td>
                                                            <td><input type='radio' name='selectedSuit' value='$arr[0]'></td>
                                                        </tr>
                                                    HTML; 
                                                }
                                                mysqli_close($db);
                                            }
                                            else{
                                                echo '<tr><td colspan="4">No hay trajes registrados</td></tr>';
                                            }                               
                                        ?>                         
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Fecha máxima</h3>
                                <input required type="date" class="form-control" id="fecha" name="date" min="<?php echo date('Y-m-d'); ?>">
                                <br>
                            </div>
                        </div>

                        <!-- Medidas Saco -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Pago</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Precio</label>
                                        <input required id="txtPrice" name="txtPrice" type="number" class="form-control" min="0" max="10000000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Abono inicial</label>
                                        <input required id="txtInicialP" name="txtInitialP" type="number" class="form-control" min="0" max="10000000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src = "rentalCode.js"></script>
</body>