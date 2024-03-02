<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla Escolar</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link href="css/styles.css" rel="stylesheet">
</head>
<body style="background-color: #cec7cd">
<!---<body style="background-color: #cec7cd; background-image: url('ruta/a/tu/imagen.jpg'); background-size: cover;"--->

  <div class="container">
    <br>
   <!--INICIA BARRA DE NAVEGACION-----> 
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #013220; padding: 15px; text-align: center; color: white;">

    <img src="img/logocecati-150x150.png" width="8%" style="padding-right: 5px">
    <a class="nav-link" href=""></a>
    <a class="navbar-brand" href="curso.php" style="color: white; font-weight: bold; text-align:right;">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
        
     
<!--INICIA ESPECIALIDADES----->
<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEspecialidades" role="button" 
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-weight: bold;">
        Especialidad </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdownEspecialidades">
        <?php
        include_once('conexion.php'); 

        // Consultar los periodos disponibles
        $sql = "SELECT *  FROM especialidad";
        $result = $conn->query($sql);

        // Mostrar las opciones del menú desplegable
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $especialidad = $row['especialidad'];
                $ide = $row['id'];
                
                echo "<a class='dropdown-item' href='especialidades.php?especialidad={$especialidad}' 
                style='color: black; font-weight: bold;'>$especialidad</a>";
            }
        } else {
            echo "No se encontraron periodos.";
        }

        ?>
    </div>
</li>
<!--TERMINA ESPECIALIDAD----->


<!--INICIA PERIODO----->
<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPeriodo" role="button" 
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-weight: bold;">
        Periodo </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdownPeriodo">

        <?php
        include_once('conexion.php'); 

        // Consultar los periodos disponibles
        $sql = "SELECT DISTINCT periodo FROM curso";
        $result = $conn->query($sql);


        // Mostrar las opciones del menú desplegable
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $periodo = $row['periodo'];
                //$ide = $row['id'];
                
                echo "<a class='dropdown-item' href='periodos.php?periodo={$periodo}' 
                style='color: black; font-weight: bold;'>$periodo</a>";
            }
        } else {
            echo "No se encontraron periodos.";
        }

        ?>
    </div>
</li>
<!--TERMINA PERIODO----->


<!--INICIA VIGENCIA----->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVigencia" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-weight: bold;">
          Vigencia
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownVigencia">
          <!-- Aquí se generará dinámicamente las opciones -->
        <a class='dropdown-item' href='vigente.php?estado=vigente' style="color: black; font-weight: bold;">Vigente</a>
        <a class='dropdown-item' href='proximo.php?estado=proxima' style="color: black; font-weight: bold;">Próximo</a>
        <a class='dropdown-item' href='terminado.php?estado=terminado' style="color: black; font-weight: bold;">Terminado</a>
        </div>
      </li>      
    </ul>
    <!--TERMINA VIGENCIA----->


      <!-- INICIA EL BUSCADOR -->
    <form class="form-inline mx-auto mb-3" role="search" action="buscador.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="¿Buscas algo?" aria-label="Search" id="campo" name="campo">
        <button class="btn text-white" style="background-color: #e73653;" type="submit"><i class="bi bi-search"></i></button>
    </form>
     <!-- TERMINA EL BUSCADOR -->


  </div>
  
</nav>


