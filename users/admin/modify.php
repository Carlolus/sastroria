<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php');?>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }
    </style>
    
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Información</h1>

        <div class="row">
        <?php
            //include("../../resources/connect.php");
            $db = conectar();

            $sql = "SELECT login, name, image, phone FROM users WHERE login = '" . $_SESSION['xlog'] . "'";
            $result = mysqli_query($db, $sql);

            if ($result) {
                $arr = mysqli_fetch_array($result);
                $login = $arr["login"];
                $name = $arr["name"];
                $image = $arr["image"];
                $phone = $arr["phone"];
            } else {
                echo "Error en la consulta: " . mysqli_error($db);
            }
            echo <<<HTML
                <form action="procesar_actualizacion.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                        <!-- Clave de acceso -->
                            <div class="form-group">
                                <label for="clave">Clave de acceso:</label>
                                <input type="text" class="form-control" name="login" id="clave" value='$login' required>
                            </div>
                            <br>
                            <!-- Contraseña -->
                            <div class="form-group">
                                <label for="contrasena">Nueva Contraseña:</label>
                                <input type="password" class="form-control" name="password" id="contrasena" required>
                            </div>
                            <br>
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="name" id="nombre" value='$name' required>
                            </div>
                            <br>
                            <!-- Número de teléfono -->
                            <div class="form-group">
                                <label for="telefono">Número de teléfono:</label>
                                <input type="tel" class="form-control" value = '$phone'name="phone" id="telefono" pattern="[0-9]{10}" required>
                                <small class="form-text text-muted">Formato: 1234567890</small>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen">Seleccionar nueva imagen:</label>
                            </div>

                            <div class="form-group">
                                <label for="profile-image">
                                    <img src='$image' name="imgdir" alt="Profile Image" id="profile-image-preview" style="max-width: 100%; height: auto;">
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" id="profile-image" name="profile-image">
                            </div>           
                        </div>
                        <div class="col-md-12"> 
                            <button type="submit" action="updateInfo.php" class="btn btn-dark btn-block">Actualizar</button>
                        </div>
                    </div>    
                </form>   
            HTML;  
                mysqli_close($db);
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="cambiarImg.js"></script>
</body>
</html>