<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("resources/header.php"); ?>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="info text-center">
                    <h1>¡Bienvenid@ a</h1>
                    <h1> Sastrería Sur!</h1>
                    <br>    
                    <div class="info">
                        <div class="candidatos">
                            <div class="content">
                                <span><ion-icon name="create-outline"></ion-icon>  Explora las funciones intuitivas de nuestro software para gestionar de manera eficiente tus usuarios y proyectos.</span> <br>
                                <span><ion-icon name="accessibility-outline"></ion-icon>   Ajusta patrones y experimenta con estilos únicos. La confección nunca fue tan precisa y emocionante.</span><br>
                                <span><ion-icon name="newspaper-outline"></ion-icon> Administra tus servicios de alquiler de manera eficiente con nuestra plataforma.</span>
                                <!-- <span><ion-icon name="refresh-outline"></ion-icon>  Mantén actusadddddddddddddalizado tu CV</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <div class="col-md-6">
                <div id="registro" class="text-center p-4 border" style="background-color: #212529; color: white; Border-radius: 15px">
                    <h2>Inicio de Sesión</h2>
                    <br>
                    <form action = "resources/verify.php" method = "post">
                        <div class="mb-3">
                            <label for="correo" class="form-label text-white">Usuario</label>
                            <input type="text" class="form-control" id="login" name = "login"required>
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label text-white">Contraseña</label>
                            <input type="password" class="form-control" id="password" name = "password" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Iniciar Sesión</button>
                        <?php
                            if (isset($_REQUEST["msg"])) {    //si existe algo, si esta asignado, si la variable esta creada o existe
                                $x = $_REQUEST["msg"];
                                if ($x == 1) echo "<h4 class='text-danger'>Usuario no ENCONTRADO</h4>";
                                else echo "<h4 class='text-danger'>Acceso no autorizado!!</h4>";
                            }
                        ?>
                    </form>
                    <br>
                    <a href="#" class="mt-2 text-white">Crear cuenta</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>