<?php
include_once('navbar.php');
include_once('conexion.php');  
?>

<br>

<h2 class="text-center mb-4">Ciclo Escolar 2023-2004</h2>
<div class="container">
<!-----------Cursos desde la base de datos conforme a su periodo ---------------->
    <div class="row">
            
        <?php

            $periodo=$_GET['periodo'];
            echo "<br>";
            echo "<br>";
            echo "<br>";
            $where="WHERE periodo='$periodo' ";

            echo "<div><h1 class='text-center'>" . $periodo . " Periodo</h1>";
        ?>

    </div>

    <!-- Tabla -->
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
                // Establecer el contador inicial en 1
                $contador = 1;

                // Ejecutar la consulta
                $sql = "SELECT  grupo, nombre, fecha_inicio, fecha_terminacion,inscritos, egresados, dias, 
                horario, costo, periodo, observaciones FROM curso WHERE periodo LIKE '%$periodo%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Imprimir los datos en la tabla HTML
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // Imprimir el contador en la primera columna
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
                        echo "<td><button type='button' class='btn btn-outline-dark' data-toggle='modal' data-target='#modalObservaciones" . $contador . "'><i class='bi bi-eye-fill'></i>  Ver más</button></td>";
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
                } else {
                    //echo "0 resultados";
                }
                $conn->close();
            ?>
        </tbody>
    </table>

</div>
</div>


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

  <br>
<br>
<?php
include_once('footer.php'); 
?>

</body>
</html> 
