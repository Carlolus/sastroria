<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .disponible {
            color: #28a745;
        }

        .no-disponible {
            color: #dc3545; 
        }

        img{
            max-width: 100px;
            max-height: 100px;
        }
    </style>
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
                        <h5 class="mb-0">Listado de confecciones</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Título</th>
                                    <th>Cliente</th>
                                    <th></th>
                                    <th>Encargado</th>
                                    <th>Fecha de entrega</th>
                                    <th>Estado</th>
                                    <th class="text-end">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="process.php" method = "POST">
                                    <?php
                                        $db = conectar();
                                        $sql = "SELECT confections.id, title, customers.name, ref_img, users.name, stip_del_date, confections.state 
                                        FROM confections JOIN customers ON customer = customers.id JOIN users ON responsible = login ORDER BY confections.state DESC";
                                        $result = mysqli_query($db, $sql);
                                        $n = mysqli_num_rows($result);
                                        if($n > 0){
                                            while ($arr=mysqli_fetch_array($result)) {
                                                $estado = ($arr[6] == 'f') ? 'Terminado' : 'Pendiente';
                                                $claseEstado = ($arr[6] == 'f') ? 'disponible' : 'no-disponible';
                                                if($arr[6] == 'f'){
                                                echo 
                                                <<< HTML
                                                    <tr class="align-middle">
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <div class="h6 mb-0 lh-1">$arr[1]</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>$arr[2]</span></td>
                                                        <td><span class="d-inline-block align-middle"><img src="$arr[3]" alt="img_ref" width = "50"></span></td>
                                                        <td>$arr[4]</td>
                                                        <td>$arr[5]</td>
                                                        <td><span class="d-inline-block align-middle $claseEstado">$estado</span></td>
                                                        <td class="text-end">
                                                            <div class="drodown">
                                                                <a data-bs-toggle="dropdown" href="#" class="btn p-1 dropdown-trigger" aria-expanded="false" data-id="$arr[0]">
                                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end" >
                                                                    <button type="submit" class = "dropdown-item" name="submitView">Ver información</button>
                                                                    <a href="#" onclick = "confirmDelete({$arr[0]},'$arr[1]')" class="dropdown-item">Eliminar Confección</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                HTML; 
                                                }
                                                else{
                                                    echo 
                                                <<< HTML
                                                    <tr class="align-middle">
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <div class="h6 mb-0 lh-1">$arr[1]</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>$arr[2]</span></td>
                                                        <td><span class="d-inline-block align-middle"><img src="$arr[3]" alt="img_suit" width = "100"></span></td>
                                                        <td>$arr[4]</td>
                                                        <td>$arr[5]</td>
                                                        <td><span class="d-inline-block align-middle $claseEstado">$estado</span></td>
                                                        <td class="text-end">
                                                            <div class="drodown">
                                                                <a data-bs-toggle="dropdown" href="#" class="btn p-1 dropdown-trigger" aria-expanded="false" data-id="$arr[0]">
                                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end" >
                                                                    <button type="submit" class = "dropdown-item" name="submitView">Ver información</button>
                                                                    <button type="submit" class = "dropdown-item" name="submitModificar">Actualizar información</button>
                                                                    <a href="#" onclick = "confirmFinish({$arr[0]},'$arr[2]')" class="dropdown-item">Dar por finalizado</a>
                                                                    <a href="#" onclick = "confirmDelete({$arr[0]},'$arr[1]')" class="dropdown-item">Eliminar confección</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                HTML; 
                                                }
                                            }
                                            mysqli_close($db);
                                        }
                                        else{
                                            echo '<tr><td colspan="6">No hay alquileres regisdtrados.</td></tr>';
                                        }                               
                                    ?>
                                    <input type="hidden" name="obj" id = "obj">
                                </form>    
                            </tbody>
                        </table>                    
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
                        <input type="hidden" name="confection_id" id = "confection_id">
                    </div>
                    <div class="modal-body" id = "bodyModalConfirm">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <input type="submit" class="btn btn-primary" value = "Si, continuar">
                    </div>
                </div>
            </form>    
        </div>
    </div>

    <div class="modal" tabindex="-1" id = "modalConfirmFin">
        <div class="modal-dialog">
            <form action = "finish_confection.php" id = "frmConfFin" method = "post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <input type="hidden" name="confection_id_fin" id = "confection_id_fin">
                    </div>
                    <div class="modal-body" id = "bodyModalConfirmFin">
                        
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
    <script src = "codeDelete.js"></script>
    <script src = "codeFinish.js"></script>
    <script src = "genCode.js"></script>
    
</body>
</html>