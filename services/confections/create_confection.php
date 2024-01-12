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
            max-width: 400px; 
            max-height: 200px; 
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
    
    <form action="create_confection2.php" id = "frmCreateConfection" method = "post">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted">
                        <i class="bi bi-arrow-left-square me-2"></i></a>Nueva Confección</h2>
                    <div class="hstack gap-3">
                        <a href="list_confections.php" class="btn btn-light btn-sm btn-icon-text">
                            <i class="bi bi-x"></i>
                            <span class="text">Cancelar</span>
                        </a>                 
                        <button id = "btnSave" class="btn btn-dark btn-sm btn-icon-text" type="submit"><i class="bi bi-save"></i> <span class="text">Guardar</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
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

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4 mb-4">Detalles</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="h6">Título del pedido</h3>
                                        <input type = "text" class ="form-control" name = "txtTitle" required maxlength="50" required>
                                        <br>
                                    </div>                     
                                    <div class="col-lg-12">
                                        <h3 class="h6">Detalles del pedido</h3>
                                        <textarea class="form-control" rows="5" name = "txtDetails" placeholder="Escribe aquí..." maxlength = "120" required></textarea>
                                        <br>
                                    </div>
                                    <div class="col-lg-12" id="formimg">
                                        <div class="form-group">
                                            <label for="imagen">Imagen:</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-image">
                                                <img src = "https://i.ibb.co/Ptv0J1v/default-traje.png" name="imgdir" alt="Profile Image" id="suit-image-preview">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-file-input">
                                                <input type="file" id="profile-image" name="profile-image">
                                            </label>
                                        </div>

                                        <input type="hidden" id="image-url" name="image-url" value = "https://i.ibb.co/Ptv0J1v/default-traje.png">
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
                                            $sql = "SELECT login, name FROM users";
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
                                                            <td><input type='radio' name='selectedAdmin'value='$arr[0]' checked></td>
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

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h4">Detalles tela</h3>     
                                <h3 class="h6">Tipo de tela</h3>
                                    <select class="form-control" id="fabric_list" name = "fabric_list" >
                                        <option>Lino</option>
                                        <option>Paño</option>
                                        <option>Poliéster</option>
                                        <option>Pana</option>
                                        <option>Dril</option>
                                </select>     
                                <br>
                                <h3 class="h6">¿Provee la tela?</h3>
                                <div class="form-check form-switch">
                                    <input type="hidden" id="hiddenProv" name="hiddenProv" value = "n">
                                    <input class="form-check-input" type="checkbox" id="prov_fabric" name = "prov_fabric"> 
                                </div>
                                <br>
                                <label class="form-label">Cantidad (cm)</label>
                                <input id="txtQuantity" name="txtQuantity" type="number" class="form-control" min="0" max="10000" required>
                                <br>
                                <label class="form-label">Precio Tela</label>
                                <input id="txtFabricPrice" name="txtFabricPrice" type="number" class="form-control" min="0" max="10000000">

                                <input type="hidden" id="precioTela" name="precioTela" value = "0">
    
                                
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Fecha de entrega</h3>
                                <input required type="date" class="form-control" id="fecha" name="date" min="<?php echo date('Y-m-d'); ?>">
                                <br>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Pago</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Precio Confección</label>
                                        <input value = "0" required id="txtPrice" name="txtPrice" type="number" class="form-control" min="0" max="10000000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Abono inicial</label>
                                        <input value = "0" required id="txtInicialP" name="txtInitialP" type="number" class="form-control" min="0" max="10000000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Costo total</label>
                                        <input value = "0" required id="txtCostoTotal" type="number" class="form-control" disabled>
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
    <script src = "codeConfection.js"></script>
    <script src = "imgUpload.js"></script>
</body>