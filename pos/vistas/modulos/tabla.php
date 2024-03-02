<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla Escolar</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="vistas\dist\css/estilos.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <br>
    <h2 class="text-center mb-4">Ciclo Escolar 2023-2004</h2>
    <br>
    <br>

    <!-- Menú con botones desplegables -->
    <div class="row mb-4">
      <div class="col">
        <div class="dropdown menu-btn">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="menuDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menú
          </button>
          <div class="dropdown-menu" aria-labelledby="menuDropdown">
            <a class="dropdown-item" href="#">Opción 1</a>
            <a class="dropdown-item" href="#">Opción 2</a>
            <a class="dropdown-item" href="#">Opción 3</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="dropdown menu-btn">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="especialidadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Especialidad
          </button>
          <div class="dropdown-menu" aria-labelledby="especialidadDropdown">
            <a class="dropdown-item" href="#">Especialidad 1</a>
            <a class="dropdown-item" href="#">Especialidad 2</a>
            <a class="dropdown-item" href="#">Especialidad 3</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="dropdown menu-btn">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="periodoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Periodo
          </button>
          <div class="dropdown-menu" aria-labelledby="periodoDropdown">
            <a class="dropdown-item" href="#">Periodo 1</a>
            <a class="dropdown-item" href="#">Periodo 2</a>
            <a class="dropdown-item" href="#">Periodo 3</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="dropdown menu-btn">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="terminacionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Terminación
          </button>
          <div class="dropdown-menu" aria-labelledby="terminacionDropdown">
            <a class="dropdown-item" href="#">Terminación 1</a>
            <a class="dropdown-item" href="#">Terminación 2</a>
            <a class="dropdown-item" href="#">Terminación 3</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla -->
    <table class="table">
      <thead>
        <tr class="header-row">
          <th scope="col">Nombre</th>
          <th scope="col">Docente</th>
          <th scope="col">Horario</th>
          <th scope="col">Días</th>
          <th scope="col">Inicio</th>
          <th scope="col">Terminación</th>
          <th scope="col">Observaciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Aquí se pueden añadir filas con datos -->
        <tr>
          <td>Nombre 1</td>
          <td>Docente 1</td>
          <td>Horario 1</td>
          <td>Días 1</td>
          <td>Inicio 1</td>
          <td>Terminación 1</td>
          <td>Observaciones 1</td>
        </tr>
        <tr>
          <td>Nombre 2</td>
          <td>Docente 2</td>
          <td>Horario 2</td>
          <td>Días 2</td>
          <td>Inicio 2</td>
          <td>Terminación 2</td>
          <td>Observaciones 2</td>
        </tr>
        <!-- Se pueden añadir más filas según sea necesario -->
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
