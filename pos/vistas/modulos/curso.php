<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Curso
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Curso</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCurso">
          
          Agregar Curso

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Docente</th>
           <th>Especialidad</th>
           <th>Fecha de Inicio</th>
           <th>Fecha de Terminación</th>
           <th>Días</th>
           <th>Horario</th>
           <th>Costo</th>
           <th>Modalidad</th>
           <th>Grupo</th>
           <th>Inscritos</th>
           <th>Egresados</th>
           <th>Observaciones</th>
           <th>Periodo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>  
          
        <!--TABLA PARA LOS CURSOS--->
        <?php

          $item = null;
          $valor = null;

          $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);

          //var_dump($cursos);

          foreach ($cursos as $key => $value) {

            echo '<tr>

              <td>'.($key+1).'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["docente"].'</td>
              <td>'.$value["especialidad"].'</td>
              <td>'.$value["fecha_inicio"].'</td>
              <td>'.$value["fecha_terminacion"].'</td>
              <td>'.$value["dias"].'</td>
              <td>'.$value["horario"].'</td>
              <td>'.$value["costo"].'</td>
              <td>'.$value["modalidad"].'</td>
              <td>'.$value["grupo"].'</td>
              <td>'.$value["inscritos"].'</td>
              <td>'.$value["egresados"].'</td>
              <td>'.$value["observaciones"].'</td>
              <td>'.$value["periodo"].'</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning btnEditarCurso" data-toggle="modal" data-target="#modalEditarCurso"
                  idCurso="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarCurso" idCurso="'.$value["id"].'"><i  class="fa fa-trash" aria-hidden="true"></i></button>

                </div>  

              </td>

            </tr>';
        
          }

        ?>  

  <!----TERMINA LA TABLA CURSOS--->

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
    MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarCurso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#006400; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCurso" placeholder="Ingresar nombre" required>

              </div>

            </div>

                <!-- ENTRADA PARA SELECCIONAR LA DOCENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-user"></i></span> 

                <select class="form-control input-lg" id="nuevoDocente" name="nuevoDocente" required>
                  
                  <option value="">Seleccionar Docente</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $docentes = ControladorDocentes::ctrMostrarDocentes($item, $valor);

                  foreach ($docentes as $key => $value) {

                    echo '<option value="'.$value["nombre"].' '.$value["apellido_paterno"].' '.$value["apellido_materno"].'">'.$value["nombre"].' '.$value["apellido_paterno"].' '.$value["apellido_materno"].'</option>';
                 
                  }
                  
   
                  ?>

                </select>

              </div>

            </div>        


            <!-- ENTRADA PARA SELECCIONAR LA ESPECIALIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaEspecialidad" name="nuevaEspecialidad" required>
                  
                  <option value="">Seleccionar Especialidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $especialidad = ControladorEspecialidad::ctrMostrarEspecialidad($item, $valor);

                  foreach ($especialidad as $key => $value) {

                     echo'<option value="'.$value["especialidad"].'">'.$value["especialidad"].'</option>';

                  }
   
                  ?>

                </select>

              </div>

            </div>  
            
            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaInicio" placeholder="Ingresar Fecha de Inicio"
                 data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>            

            <!-- ENTRADA PARA LA FECHA DE TERMINACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaTerminacion" placeholder="Ingresar Fecha de Terminacion"
                 data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LOS DIAS-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-sun-o" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDia" placeholder="Ingresar Días" required>

              </div>

            </div>         
            
            <!-- ENTRADA PARA EL HORARIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoHorario" placeholder="Ingresar Horario" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA EL COSTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-money" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar Costo" required>

              </div>

            </div>   
            
            
            <!-- ENTRADA PARA SELECCIONAR SU MODALIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> 

                <select class="form-control input-lg" name="nuevaModalidad">
                  
                  <option value="">Selecionar Modalidad</option>

                  <option value="Presencial">Presencial</option>

                  <option value="En Linea">En Linea</option>

                </select>

              </div>

            </div>            
            
            <!-- ENTRADA PARA EL GRUPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-users" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoGrupo" placeholder="Ingresar Grupo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LOS INSCRITOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-registered" aria-hidden="true"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoIngresado" placeholder="Ingresar los Inscritos" required>

              </div>

            </div> 

            <!-- ENTRADA PARA LOS EGRESADOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> 

                <input type="number"  class="form-control input-lg" name="nuevoEgresado" placeholder="Ingresar los Egresados" required>

              </div>

            </div> 

            <!-- ENTRADA PARA LAS OBSERVACIONES-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-eye" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaObservacion" placeholder="Ingresar Observación" required>

              </div>

            </div> 

         <!-- ENTRADA PARA EL PERIODO-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-life-ring" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPeriodo" placeholder="Ingresar Periodo" required>

              </div>

            </div> 

 <!---Termina el formulario---->

          </div>

        </div>

        <!--=====================================
                PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar Curso</button>

        </div>


      </form>

      <?php

        $crearCurso = new ControladorCursos();
        $crearCurso -> ctrCrearCurso();

      ?>
        

    </div>

  </div>

</div>


<!--=====================================
    MODAL EDITAR CURSO
======================================-->

<div id="modalEditarCurso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#006400; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCurso" id="editarCurso" required>
                <input type="hidden" id="idCurso" name="idCurso">  
              </div>

            </div>

                <!-- ENTRADA PARA SELECCIONAR LA DOCENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-user"></i></span> 

                <select class="form-control input-lg" id="editarDocente" name="editarDocente" required>
                  
                  <option value="">Seleccionar Docente</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $docentes = ControladorDocentes::ctrMostrarDocentes($item, $valor);

                  foreach ($docentes as $key => $value) {

                    echo '<option value="'.$value["nombre"].' '.$value["apellido_paterno"].' '.$value["apellido_materno"].'">'.$value["nombre"].' '.$value["apellido_paterno"].' '.$value["apellido_materno"].'</option>';
                 
                  }
                  
   
                  ?>

                </select>

              </div>

            </div>        


            <!-- ENTRADA PARA SELECCIONAR LA ESPECIALIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarEspecialidad" name="editarEspecialidad" required>
                  
                  <option value="">Seleccionar Especialidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $especialidad = ControladorEspecialidad::ctrMostrarEspecialidad($item, $valor);

                  foreach ($especialidad as $key => $value) {

                     echo'<option value="'.$value["especialidad"].'">'.$value["especialidad"].'</option>';

                  }
   
                  ?>

                </select>

              </div>

            </div>  
            
            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaInicio" id="editarFechaInicio"
                 data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>            

            <!-- ENTRADA PARA LA FECHA DE TERMINACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaTerminacion" id="editarFechaTerminacion"
                 data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LOS DIAS-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-sun-o" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDia" id="editarDia" required>

              </div>

            </div>         
            
            <!-- ENTRADA PARA EL HORARIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarHorario" id="editarHorario" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA EL COSTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-money" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCosto" id="editarCosto" required>

              </div>

            </div>   
            
            
            <!-- ENTRADA PARA SELECCIONAR SU MODALIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> 

                <select class="form-control input-lg" name="editarModalidad" id="editarModalidad">
                  
                  <option value="">Selecionar Modalidad</option>

                  <option value="Presencial">Presencial</option>

                  <option value="En Linea">En Linea</option>

                </select>

              </div>

            </div>            
            
            <!-- ENTRADA PARA EL GRUPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-users" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGrupo" id="editarGrupo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LOS INSCRITOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-registered" aria-hidden="true"></i></span> 

                <input type="number" class="form-control input-lg" name="editarIngresado" id="editarIngresado" required>

              </div>

            </div> 

            <!-- ENTRADA PARA LOS EGRESADOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> 

                <input type="number"  class="form-control input-lg" name="editarEgresado" id="editarEgresado" required>

              </div>

            </div> 

            <!-- ENTRADA PARA LAS OBSERVACIONES-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-eye" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" required>

              </div>

            </div> 

             <!-- ENTRADA PARA EL PERIODO-->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-life-ring" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPeriodo" id="editarPeriodo" required>

              </div>

            </div> 
           

 <!---Termina el formulario---->

          </div>

        </div>

        <!--=====================================
                PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar Cambios</button>

        </div>


      </form>

          <?php

          $editarCurso = new ControladorCursos();
          $editarCurso -> ctrEditarCurso();

          ?>
            

    </div>

  </div>

</div>

<?php

$eliminarCurso = new ControladorCursos();
$eliminarCurso -> ctrEliminarCurso();

?>
