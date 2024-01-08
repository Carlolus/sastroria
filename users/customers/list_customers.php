<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
    <?php include('../../resources/menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <br>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <br>
                        <h5 class="mb-0">Listado de clientes</h5>
                        <a href="create_customer.php" class="btn btn-light btn-sm">Añadir Cliente</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Correo</th>
                                    <th class="text-end">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $db = conectar();
                                    $sql = "SELECT id, name, phone, adress, mail FROM customers WHERE state = 'v' ORDER BY name";
                                    $result = mysqli_query($db, $sql);
                                    $n = mysqli_num_rows($result);
                                    if($n > 0){
                                        while ($arr=mysqli_fetch_array($result)) {
                                            echo 
                                            <<< HTML
                                                <tr class="align-middle">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <div class="h6 mb-0 lh-1">$arr[0]</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$arr[1]</td>
                                                    <td><span class="d-inline-block align-middle">$arr[2]</span></td>
                                                    <td><span>$arr[3]</span></td>
                                                    <td>$arr[4]</td>
                                                    <td class="text-end">
                                                        <div class="drodown">
                                                            <a data-bs-toggle="dropdown" href="#" class="btn p-1 dropdown-trigger" aria-expanded="false" data-id="$arr[0]">
                                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end" >
                                                                <a href="view_info.php?id=$arr[0]" class="dropdown-item">Ver información</a>
                                                                <a href="modify_customer.php?id=$arr[0]" class="dropdown-item">Editar</a>
                                                                <a href="#" onclick = "confirmDelete({$arr[0]},'$arr[1]')" class="dropdown-item">Eliminar Cliente</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            HTML; 
                                        }
                                        mysqli_close($db);
                                    }
                                    else{
                                        echo '<tr><td colspan="6">No hay clientes registrados</td></tr>';
                                    }                               
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="obj" id = "obj">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id = "modalConfirm">
        <div class="modal-dialog">
            <form action = "delete_customer.php" id = "frmConf" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <input type="hidden" name="customer_id" id = customer_id>
                    </div>
                    <div class="modal-body" id = "bodyModalConfirm">
                        <p>Está seguro de que desea eliminar al cliente.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <input type="submit" class="btn btn-primary" value = "Si, continuar">
                    </div>
                </div>
            </form>    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    </body>
    <script src="codeDelete.js"></script>
    <script src="genCode.js"></script>
</body>
</html>