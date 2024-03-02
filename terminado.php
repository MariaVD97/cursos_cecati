<?php
// Incluye el archivo de conexión a la base de datos
include_once('conexion.php'); 
include_once('navbar.php'); 

// Establece el título de la página
$titulo = "Cursos Terminados";

// Consulta SQL para obtener los cursos terminados
$sql = "SELECT grupo, nombre, fecha_inicio, fecha_terminacion, inscritos, egresados, dias, horario, costo, periodo, observaciones 
        FROM curso 
        WHERE fecha_terminacion < CURDATE()"; // CURDATE() devuelve la fecha actual
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<br>";
    echo "<h2 class='text-center mb-4'>Ciclo Escolar 2023-2024</h2>";
    // Imprime el título
    echo "<h2 class='text-center mb-4'>$titulo</h2>";

    // Imprime la tabla de cursos
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr class='header-row'>";
    echo "<th scope='col'>Grupo</th>";
    echo "<th scope='col'>Nombre del Curso</th>";
    echo "<th scope='col'>Fecha de Iniciación</th>";
    echo "<th scope='col'>Fecha de Terminación</th>";
    echo "<th scope='col'>Inscritos</th>";
    echo "<th scope='col'>Egresados</th>";
    echo "<th scope='col'>Días</th>";
    echo "<th scope='col'>Horario</th>";
    echo "<th scope='col'>Costo</th>";
    echo "<th scope='col'>Observaciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Establece el contador inicial en 1
    $contador = 1;

    // Itera sobre cada fila de la tabla de cursos
    while ($row = $result->fetch_assoc()) {
        // Imprime los datos de cada curso
        echo "<tr style='background-color: rgb(236, 155, 155);'>"; // Rojo para cursos terminados
        echo "<td>" . $row["grupo"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_terminacion"] . "</td>";
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

        




        // Incrementa el contador en cada iteración
        $contador++;
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No hay cursos terminados en este momento.</p>";
}

// Cierra la conexión a la base de datos
$conn->close();
?>

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