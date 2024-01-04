<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php'); ?>

    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>
    
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Información</h1>

        <div class="row">
            <!-- Div izquierdo para datos del administrador -->
            <div class="col-md-6">
                <form action="procesar_actualizacion.php" method="post">

                    <!-- Clave de acceso -->
                    <div class="form-group">
                        <label for="clave">Clave de acceso:</label>
                        <input type="text" class="form-control" name="clave" id="clave" required>
                    </div>
                    <br>
                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="contrasena">Nueva Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                    </div>
                    <br>
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <br>
                    <!-- Número de teléfono -->
                    <div class="form-group">
                        <label for="telefono">Número de teléfono:</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" pattern="[0-9]{10}" required>
                        <small class="form-text text-muted">Formato: 1234567890</small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark btn-block">Actualizar</button>
                </form>
            </div>

            <div class="col-md-6">
            <form action="procesar_cambio_imagen.php" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
            <form action="procesar_cambio_imagen.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="imagen">Seleccionar nueva imagen:</label>
            </div>

            <div class="form-group">
                <label for="profile-image">
                    <img src="/sAstroria/images/pfp/usuario.png" alt="Profile Image" id="profile-image-preview" style="max-width: 100%; height: auto;">
                </label>
            </div>
            <div class="form-group">
                <input type="file" id="profile-image" name="profile-image">
            </div>
    </form>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="cambiarImg.js"></script>
</body>
</html>