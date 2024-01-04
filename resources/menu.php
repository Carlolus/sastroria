<?php
    session_start();
    $url = "/sAstroria/";
    if (!isset($_SESSION["xlog"])) {   //si no esta creada la variable de sesion
    header("Location: ../index.php?msg=2");
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="#">Sastrería Sur</a>
            <span><img src="/sAstroria/images/icons/señora.png" alt="hola" style="width: 30px; height: auto;"></span>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo $url; ?>main.php">Inicio</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clientes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Añadir</a></li>
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                    </ul>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Alquiler</a></li>
                        <li><a class="dropdown-item" href="#">Confecciónes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    </ul>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reportes
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Generar Factura de pago</a></li>
                        <li><a class="dropdown-item" href="#">Servicios pendientes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-inline-block text-nowrap">
                            <img src="
                                <?php
                                    include("connect.php");
                                    $db = conectar();

                                    $sql = "SELECT image FROM users WHERE login = '" . $_SESSION['xlog'] . "'";
                                    $result = mysqli_query($db, $sql);

                                    if ($result) {
                                        $arr = mysqli_fetch_assoc($result);
                                        if ($arr['image'] == null || $arr['image'] == "") {
                                            echo "/sAstroria/images/pfp/pfp_admin.png";
                                        } else {
                                            echo $arr['image'];
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Error en la consulta: " . mysqli_error($db);
                                    }                               
                                    mysqli_close($db);
                                ?>" 
                                alt="Imagen de Usuario" style="width: 20px; height: 20px; border-radius: 50%;">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?php echo $url; ?>users/admin/modify.php">Configuración</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url; ?>resources/close.php">Cerrar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    </ul>
                </li>           
            </ul>
        </div>
    </div>
</nav>
