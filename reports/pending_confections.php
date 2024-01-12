<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../resources/header.php');?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>

        body {
            font-family: 'Roboto', sans-serif;
            background:#eee;
        }
        
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
    <?php include('../resources/menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <br>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <br>
                        <h5 class="mb-0">Listado de servicios pendientes</h5>
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
                                    <th>Días restantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="process.php" method = "POST">
                                    <?php
                                        $db = conectar();
                                        $sql = "SELECT confections.id, title, customers.name, ref_img, users.name, stip_del_date, confections.state
                                        FROM confections JOIN customers ON customer = customers.id JOIN users ON responsible = login WHERE confections.state = 'u' ORDER BY stip_del_date ASC";
                                        $result = mysqli_query($db, $sql);
                                        $n = mysqli_num_rows($result);
                                        if($n > 0){
                                            while ($arr=mysqli_fetch_array($result)) {
                                                $estado = ($arr[6] == 'f') ? 'Terminado' : 'Pendiente';
                                                $claseEstado = ($arr[6] == 'f') ? 'disponible' : 'no-disponible';
                                                $del_date = date('d-m-Y', strtotime($arr[5]));
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
                                                        <td>$del_date</td>
                                                        <td><span class="d-inline-block align-middle $claseEstado">$estado</span></td>
                                                        <td>
                                                            
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
                                                        <td>$del_date</td>
                                                        <td><span class="d-inline-block align-middle $claseEstado">$estado</span></td>
                                                    HTML;
                                                        $fechaEntrega = new DateTime(date('Y-m-d', strtotime($arr[5])));
                                                        $hoy = new DateTime();
                                                        
                                                        $diferencia = $hoy->diff($fechaEntrega);
                                                        $quedanDias = $diferencia->days;
                                                        echo "<td> Quedan $quedanDias días para la entrega</td></tr>";    
                                                }
                                            }
                                            mysqli_close($db);
                                        }
                                        else{
                                            echo '<tr><td colspan="6">No hay confecciones pendientes.</td></tr>';
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    </body>
    
</body>
</html>