<?php

include_once('navbar.php');
include_once('conexion.php'); 

echo "<br>";
echo "<h2 class='text-center mb-4'>Ciclo Escolar 2023-2004</h2>";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha proporcionado un término de búsqueda
    if (!empty($_POST["campo"])) {
        // Sanitizar y obtener el término de búsqueda
        $busqueda = $_POST["campo"];

        // Realizar la búsqueda en la base de datos
        $sql = "SELECT grupo, nombre, fecha_inicio, fecha_terminacion, inscritos, egresados, dias, horario, costo, observaciones FROM curso WHERE 
                nombre LIKE '%" . $busqueda . "%' OR
                especialidad LIKE '%" . $busqueda . "%' OR
                periodo LIKE '%" . $busqueda . "%' OR
                grupo LIKE '%" . $busqueda . "%' OR
                dias LIKE '%" . $busqueda . "%' OR
                costo LIKE '%" . $busqueda . "%' OR
                observaciones LIKE '%" . $busqueda . "%' OR
                horario LIKE '%" . $busqueda . "%'";
        $result = $conn->query($sql);

        // Mostrar los resultados de la búsqueda en una tabla
        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='header-row'>";
            echo "<th scope='col'>#</th>";  
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

            $contador = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
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
                echo "<td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#modalObservaciones" . $contador . "'>Ver más</button></td>";
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
                echo "<button type='button' class='btn btn-success' data-dismiss='modal'>Cerrar</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $contador++;
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No se encontraron resultados para la búsqueda: " . $busqueda;
        }
    } else {
        echo "Por favor, ingresa un término de búsqueda.";
    }
}
?>
<script>
    // Obtenemos todas las filas de la tabla
    const filas = document.querySelectorAll('tbody tr');

    // Iteramos sobre cada fila
    filas.forEach(fila => {
        const fechaInicio = new Date(fila.querySelector('.fecha_inicio').textContent);
        const fechaFin = new Date(fila.querySelector('.fecha_terminacion').textContent);
        const hoy = new Date();

        if (hoy < fechaInicio) {
            fila.classList.add('vigente');
        } else if (hoy >= fechaInicio && hoy <= fechaFin) {
            fila.classList.add('proximo');
        } else {
            fila.classList.add('terminado');
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>