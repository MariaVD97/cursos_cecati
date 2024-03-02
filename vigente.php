<?php
include_once('conexion.php'); 
include_once('navbar.php'); 

// Establece el título de la página
$titulo = "Cursos Vigentes";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Cursos Vigentes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <br>
    <h2 class="text-center mb-4">Ciclo Escolar 2023-2004</h2>
    <table class="table">
        <thead>
            <tr class="header-row">
                <th scope="col">#</th>  
                <th scope="col">Grupo</th>
                <th scope="col">Nombre del Curso</th>
                <th scope="col">Fecha de Iniciación</th>
                <th scope="col">Fecha de Terminación</th>
                <th scope="col">Inscritos</th>
                <th scope="col">Egresados</th>
                <th scope="col">Días</th>
                <th scope="col">Horario</th>
                <th scope="col">Costo</th>
                <th scope="col">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Imprime el título
             echo "<h2 class='text-center mb-4'>$titulo</h2>";


            $contador = 1;
            $sql = "SELECT grupo, nombre, fecha_inicio, fecha_terminacion, inscritos, egresados, dias, horario, costo, periodo, observaciones FROM curso WHERE fecha_terminacion >= CURDATE()";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr style='background-color: rgb(145, 235, 145);'>"; // Verde para cursos vigentes
                    echo "<td>" . $contador . "</td>";
                    echo "<td>" . $row["grupo"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td class='fecha_inicio'>" . $row["fecha_inicio"] . "</td>";
                    echo "<td class='fecha_terminacion'>" . $row["fecha_terminacion"] . "</td>";
                    echo "<td>" . $row["inscritos"] . "</td>";
                    echo "<td>" . $row["egresados"] . "</td>";
                    echo "<td>" . $row["dias"] . "</td>";
                    echo "<td>" . $row["horario"] . "</td>";
                    echo "<td>" . $row["costo"] . "</td>";
                    // Agregar un botón "Ver más" que abre un modal con las observaciones completas
                    echo "<td><button type='button' class='btn btn-outline-dark' data-toggle='modal' data-target='#modalObservaciones" . $contador . "'><i class='bi bi-eye-fill'></i> Ver más</button></td>";
                    echo "</tr>";
                    
                   // Modal para mostrar las observaciones completas
                    echo "<div class='modal fade' id='modalObservaciones" . $contador . "' tabindex='-1' role='dialog' aria-labelledby='modalObservacionesLabel" . $contador . "' aria-hidden='true'>";
                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header' style='background-color: #006400; color: white;'>";
                    echo "<h5 class='modal-title' id='modalObservacionesLabel" . $contador . "'>Observaciones</h5>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    echo "<p style='color: black; font-weight: bold;'>"; // Aplicar el color negro y negrita al texto de las observaciones
                    echo $row["observaciones"]; // Mostrar las observaciones completas en el modal
                    echo "</p>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
            

                    // Incrementar el contador en cada iteración
                    $contador++;
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No hay cursos vigentes en este momento.</p>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<br>
<br>
<?php
include_once('footer.php'); 
?>

</body>
</html>
