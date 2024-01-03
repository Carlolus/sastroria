<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("resources/header.php"); ?>
</head>
<body>
    <?php include("resources/menu.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col p-4 d-flex align-items-start justify-content-center flex-column">
                <h1>Sistema de administración Sastreria</h1>
                <hr>
                <h4>Ingenieria de sistemas &copy;</h4>
                <i>2024</i>
            </div>
            <div class="col p-4">
                <div class="card shadow-sm" style="max-width: 46rem;">
                    <img src="./images/candado.jpg" class="card-img-top" alt="candado">
                    <div class="card-body">
                        <h4 class="card-title">Inicio de sesión</h4>
                        <form action="recursos/verificar.php" method="post">
                            <label class="form-label">Login</label>
                            <input type="text" required name="txtlog" maxlenght="50" class="form-control">

                            <label class="form-label">Clave</label>
                            <input type="password" required name="txtpass" maxlenght="50" class="form-control">
                            <br>
                            <input type="submit" value="Acceder" class="btn btn-primary">
                            <br>
                            <?php
                            if (isset($_REQUEST["msg"])) {    //si existe algo, si esta asignado, si la variable esta creada o existe
                                $x = $_REQUEST["msg"];
                                if ($x == 1) echo "<h4 class='text-danger'>Usuario no ENCONTRADO</h4>";
                                else echo "<h4 class='text-danger'>Acceso no autorizado!!</h4>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>        
</html>