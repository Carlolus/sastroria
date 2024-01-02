<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Diego Germán Delgado Martinez -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-toggler-icon" id="barra"></span>

        <div class="imagenlogo navbar-brand">
            <img src="img/america-del-sur 2.png" alt="si">
            <h2 class="logo">SoftwareLA</h2>
        </div>

        <nav class="navbar-nav ml-auto">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Acerca</a>
            <a href="#" class="nav-link">Contacto</a>
            <a href="#" class="nav-link">Ayuda</a>
        </nav>
    </header>

    <div id="menuCompleto" class="menu-completo">
        <a href="#" class="nav-link">Inicio</a>
        <a href="#" class="nav-link">Acerca</a>
        <a href="#" class="nav-link">Contacto</a>
        <a href="#" class="nav-link">Ayuda</a>
    </div>

    <div class="container contenedor">

        <div class="info">
            <h1>¡Bienvenid@ a SoftwareLA!</h1>
            <div class="candidatos">
                <div class="content">
                    <p>En SoftwareLA, entendemos que el conocimiento es la clave para desbloquear todo tu potencial. Ofrecemos una amplia gama de cursos online diseñados para desafiar y nutrir tu mente inquisitiva. Desde principiantes hasta expertos, nuestros cursos están creados para todos, sin importar en qué punto de tu viaje de aprendizaje te encuentres.</p>
                </div>
            </div>
        </div>

        <div id="registro" class="mt-5">
            <h2>¡Crea tu cuenta y obtén hasta un 20% de descuento en cursos de programación!</h2>
            <br>
            <form>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
                <br>
                <a href="#" class="nav-link">¿Ya tienes una cuenta? Haz clic aquí para ingresar.</a>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/code.js"></script>
</body>

</html>
