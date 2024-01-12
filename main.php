<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('resources/header.php');?>
</head>
<body>
    <?php include('resources/menu.php'); ?>
    <style>     
        body {
            font-family: 'Roboto', sans-serif;
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
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted">
                    <i class="bi bi-arrow-left-square me-2"></i></a>Bienvenido administrador</h2>               
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Trabajos pendientes de finalización</h3>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="small text-uppercase bg-body text-muted">
                                            <tr>
                                                <th>Título</th>
                                                <th>Cliente</th>
                                                <th>Días restantes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="process.php" method = "POST">
                                                <?php
                                                    $db = conectar();
                                                    $sql = "SELECT confections.id, title, customers.name, ref_img, users.name, stip_del_date, confections.state
                                                    FROM confections 
                                                    JOIN customers ON confections.customer = customers.id 
                                                    JOIN users ON confections.responsible = users.login 
                                                    WHERE confections.state = 'u' 
                                                    ORDER BY stip_del_date ASC
                                                    LIMIT 5 ";

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
                                                                    <td>a</td>                                     
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
                                                                HTML;
                                                                    $fechaEntrega = new DateTime(date('Y-m-d', strtotime($arr[5])));
                                                                    $hoy = new DateTime();
                                                                    
                                                                    $diferencia = $hoy->diff($fechaEntrega);
                                                                    $quedanDias = $diferencia->days;
                                                                    echo "<td> $quedanDias días restantes.</td></tr>";    
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
                                    <br>
                                    <a href="reports/pending_confections.php" class="btn btn-dark btn-sm btn-icon-text">
                                        <i class="bi bi-x"></i>
                                        <span class="text">Ver todos</span>
                                    </a>                     
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                        <h3 class="h6 mb-4">Trajes alquilados</h3>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="small text-uppercase bg-body text-muted">
                                            <tr>
                                                <th>Prestado a</th>
                                                <th>Traje</th>
                                                <th>Desde</th>
                                                <th>Hasta</th>
                                                <th>Días restantes</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php
                                                $db = conectar();
                                                $sql = "SELECT customers.name, suits.details, loan_date, return_date 
                                                FROM rentals 
                                                JOIN customers ON id_customer = customers.id 
                                                JOIN suits ON rentals.id_suit = suits.id
                                                WHERE rentals.state = 'u' 
                                                LIMIT 3 ";

                                                $result = mysqli_query($db, $sql);
                                                $n = mysqli_num_rows($result);
                                                if($n > 0){

                                                    while ($arr=mysqli_fetch_array($result)) {
                                                        $loan_date = date('d-m-Y', strtotime($arr[2]));
                                                        $return_date = date('d-m-Y', strtotime($arr[3]));
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
                                                                <td><span>$arr[1]</span></td>
                                                                <td>$loan_date</td>
                                                                <td>$return_date</td>                                     
                                                        HTML;                                                      
                                                        
                                                            $fechaDevolucion = new DateTime(date('Y-m-d', strtotime($arr[3])));
                                                            $hoy = new DateTime();                         
                                                            $diferencia = $hoy->diff($fechaDevolucion);
                                                            $quedanDias = $diferencia->days;
                                                            echo "<td> $quedanDias</td></tr>";    
                                                    }
                                                    mysqli_close($db);
                                                }
                                                else{
                                                    echo '<tr><td colspan="6">No hay trajes alquilados.</td></tr>';
                                                }                               
                                            ?>                                               
                                        </tbody>
                                    </table>
                                    <br>
                                    <a href="services/rentals/list_rentals.php" class="btn btn-dark btn-sm btn-icon-text">
                                        <i class="bi bi-x"></i>
                                        <span class="text">Ver todos</span>
                                    </a>                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php 
                                $db = conectar();
                                $sql = "SELECT * FROM customers";
                                $result = mysqli_query($db, $sql);
                                $nc = mysqli_num_rows($result);
                                $sql = "SELECT * FROM confections";
                                $result = mysqli_query($db, $sql);
                                $ncf = mysqli_num_rows($result);
                                $sql = "SELECT * FROM rentals";
                                $result = mysqli_query($db, $sql);
                                $nr = mysqli_num_rows($result);
                                $sql = "SELECT * FROM suits";
                                $result = mysqli_query($db, $sql);
                                $ns = mysqli_num_rows($result);
                            
                            ?>
                            <label class="form-label">Clientes: <?php echo $nc ?></label>
                            <br>
                            <label class="form-label">Confecciones: <?php echo $ncf ?></label>
                            <br>
                            <label class="form-label">Alquileres: <?php echo $nr ?></label>
                            <br>
                            <label class="form-label">Trajes: <?php echo $ns ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>