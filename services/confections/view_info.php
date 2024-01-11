<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php'); ?>
    <style>     
        body {
            font-family: 'Roboto', sans-serif;
            background:#eee;
        }

        #formimg {
            max-width: 400px;
        }

        #suit-image-preview {
            max-width: 400px; /* Tamaño máximo deseado */
            max-height: 200px; /* Tamaño máximo deseado */
            height: auto;
            width: 100%;
            border-radius: 8px;
        }

        #profile-image {
            display: none;
        }

        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Seleccionar imagen de referencia';
            color: #fff;
            display: inline-block;
            background: linear-gradient(to right, #162938 50%, #183c4a 50%);
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-file-input:hover::before {
            background: #162938;
        }

        .form-check-label {
            margin-left: 15px;
        }

        .btn-dark {
            background-color: #162938;
            color: #fff;
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
                        <i class="bi bi-arrow-left-square me-2"></i></a>Información de la confección</h2>
                </div>
                <!-- Main content -->
                <div class="row">
                    <!-- Left side -->
                    <div class="col-lg-8">
                        <!-- Basic information -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Cliente</h3>
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
                                            $confection_id = $_SESSION['current_id_confection'];
                                            $sql = "SELECT id, customer, title, provide_fabric, price, initial_payment, fabric, details, ref_img
                                            , reception_date, stip_del_date, delivery_date, state, fabric_quantity, responsible FROM confections WHERE id = '$confection_id'";
                                            $result = mysqli_query($db, $sql);
                                            $arrInf=mysqli_fetch_array($result); 


                                                                 
                                            $sql = "SELECT id, name FROM customers WHERE id = '$arrInf[1]'";
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
                                <h3 class="h4 mb-4">Detalles</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="h6">Título del pedido</h3>
                                        <input value = "<?php echo $arrInf[2]?>" type = "text" class ="form-control" name = "txtTitle" required maxlength="50" required readonly>
                                        <br>
                                    </div>                     
                                    <div class="col-lg-12">
                                        <h3 class="h6">Detalles del pedido</h3>
                                        <textarea class="form-control" rows="5" name = "txtDetails" placeholder="Escribe aquí..." maxlength = "120" required readonly><?php echo $arrInf[7]?></textarea>
                                        <br>
                                    </div>
                                    <div class="col-lg-12" id="formimg">
                                        <div class="form-group">
                                            <label for="imagen">Imagen:</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-image">
                                                <img src = "<?php echo $arrInf[8]?>" name="imgdir" alt="Profile Image" id="suit-image-preview">
                                            </label>
                                        </div>
                                        
                                    </div>    
                                </div>                                   
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4 mb-4">Encargado</h3>
                                <table class="table mb-0">
                                    <thead class="small text-uppercase bg-body text-muted">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tableBodyClientes">
                                        <?php
                                            $db = conectar();
                                            $sql = "SELECT login, name FROM users WHERE login = '$arrInf[14]'";
                                            $result = mysqli_query($db, $sql);
                                            $n = mysqli_num_rows($result);
                                            $arr=mysqli_fetch_array($result);
                                              
                                            echo 
                                            <<< HTML
                                                <tr class="align-middle">
                                                    <td>
                                                        $arr[1]
                                                    </td>
                                                    <td><input type='radio' name='selectedAdmin'value='$arr[0]' checked disabled></td>
                                                </tr>
                                            HTML; 
                                            mysqli_close($db);                             
                                        ?>                         
                                    </tbody>
                                </table> 
                            </div>    
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4">Detalles tela</h3>     
                                <h3 class="h6">Tipo de tela</h3>
                                    <select class="form-control" id="fabric_list" name = "fabric_list" disabled >
                                        <option><?php echo $arrInf[6]?></option>
                                </select>     
                                <br>
                                <h3 class="h6">¿Provee la tela?</h3>
                                <div class="form-check form-switch">
                                    <input type="hidden" id="hiddenProv" name="hiddenProv" value = "n">
                                    <input <?php echo ($arrInf[3] == 'y') ? 'checked' : ''; ?> class="form-check-input" type="checkbox" id="prov_fabric" name="prov_fabric" disabled> 
                                </div>
                                <br>
                                <label class="form-label">Cantidad (cm)</label>
                                <input disabled value = "<?php echo $arrInf[13]?>" id="txtQuantity" name="txtQuantity" type="number" class="form-control" min="0" max="10000" required>
                                
                                
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Fecha recibido</h3>
                                <input disabled value = "<?php echo date("Y-m-d", strtotime($arrInf[9])); ?>" required type="date" class="form-control" id="fecha" name="date" min="<?php echo date('Y-m-d'); ?>">
                                <br>

                                <h3 class="h6">Fecha estipulada de entrega</h3>
                                <input disabled value = "<?php echo date("Y-m-d", strtotime($arrInf[10])); ?>" required type="date" class="form-control" id="fecha" name="date" min="<?php echo date('Y-m-d'); ?>">
                                <br>

                                <?php
                                    if($arrInf[12] == 'f'){
                                        $fechaEntregado = date("Y-m-d", strtotime($arrInf[10]));
                                        echo "
                                            <h3 class='h6 text-success'>Entregado el día</h3>
                                            <input disabled value = '$fechaEntregado' required type='date' class='form-control' id='fecha' name='date''>
                                            <br>
                                        ";
                                    }
                                    else{
                                        echo "<h3 class='h6 text-danger'>No entregado aún</h3>";
                                    } 
                                ?>
                            </div>
                        </div>

                        <!-- Medidas Saco -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Pago</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Precio</label>
                                        <input disabled value = "<?php echo $arrInf[4]?>" required id="txtPrice" name="txtPrice" type="number" class="form-control" min="0" max="10000000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Abono inicial</label>
                                        <input disabled value = "<?php echo $arrInf[5]?>" required id="txtInicialP" name="txtInitialP" type="number" class="form-control" min="0" max="10000000">
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
</body>