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
        body {
            font-family: 'Roboto', sans-serif;
            background:#eee;
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
                        <h5 class="mb-0">Listado de trajes</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Talla</th>
                                    <th>Detalles</th>
                                    <th>Estado</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $db = conectar();
                                    $sql = "SELECT size, details, img, state FROM suits";
                                    $result = mysqli_query($db, $sql);
                                    $n = mysqli_num_rows($result);
                                    if($n > 0){
                                        while ($arr=mysqli_fetch_array($result)) {
                                            $estado = ($arr[3] == 'a') ? 'Disponible' : 'No disponible';
                                            $claseEstado = ($arr[3] == 'a') ? 'disponible' : 'no-disponible';
                                            
                                            echo 
                                            <<< HTML
                                                <tr class="align-middle">
                                                    <td>
                                                        $arr[0]
                                                    </td>
                                                    <td>$arr[1]</td>
                                                    <td><span class="d-inline-block align-middle $claseEstado">$estado</span></td>
                                                    <td><img src='$arr[2]' width='100'></td>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
      
</body>
</html>