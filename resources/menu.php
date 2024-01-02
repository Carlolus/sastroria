<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Administración Sastreria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $url;?>main.php">Inicio</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Utilidades
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Crear Trabajo de Grado</a></li>
            <li><a class="dropdown-item" href="#">Asignar Estudiante</a></li>
            <li><a class="dropdown-item" href="#">Listar Trabajos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Crear Comité de Evaluación</a></li>
            <li><a class="dropdown-item" href="#">Evaluar</a></li>
            <li><a class="dropdown-item" href="#">Listar evaluaciones</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Reporte 1</a></li>
            <li><a class="dropdown-item" href="#">Reporte 2</a></li>
            <li><a class="dropdown-item" href="#">Reporte 3</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class = "nav-link" aria-current = "page" href = "#">Cerrar sesión</a>
        </li>
      </ul>
  
    </div>
  </div>
</nav>
