<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Información</h1>
        <form action="procesar_actualizacion.php" method="post">
            <!-- Clave de acceso -->
            <div class="form-group">
                <label for="clave">Clave de acceso:</label>
                <input type="text" class="form-control" name="clave" id="clave" required>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="contrasena">Nueva Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena" required>
            </div>

            <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>

            <!-- Imagen -->
            <div class="form-group">
                <label for="imagen">Seleccionar nueva imagen:</label>
                <input type="file" class="form-control-file" name="imagen" id="imagen" accept="image/*">
            </div>

            <!-- Número de teléfono -->
            <div class="form-group">
                <label for="telefono">Número de teléfono:</label>
                <input type="tel" class="form-control" name="telefono" id="telefono" pattern="[0-9]{10}" required>
                <small class="form-text text-muted">Formato: 1234567890</small>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>   
</body>
</html>