<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Docentes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Docentes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarDocente">
          
          Agregar Docente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Especialidad</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>  
          
        <!--TABLA PARA LOS DOCENTES--->

          <?php

            $item = null;
            $valor = null;

            $docentes = ControladorDocentes::ctrMostrarDocentes($item, $valor);

            //var_dump($docentes);

            foreach ($docentes as $key => $value) {
              
              echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["apellido_paterno"].'</td>
                        <td>'.$value["apellido_materno"].'</td>
                        <td>'.$value["especialidad"].'</td>
                        <td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarDocente" data-toggle="modal" data-target="#modalEditarDocente" 
                            idDocente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarDocente" idDocente="'.$value["id"].'"><i  class="fa fa-trash" aria-hidden="true"></i></button>

                          </div>  

                        </td>

                    </tr>';
            }

          ?> <!----TERMINA LA TABLA DOCENTES--->

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
    MODAL AGREGAR DOCENTE
======================================-->

<div id="modalAgregarDocente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#006400; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Docente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDocente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-address-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidoPaterno" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>         
            
            <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-address-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidoMaterno" placeholder="Ingresar Apellido Materno" required>

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


          </div>

        </div>

        <!--=====================================
                PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar Docente</button>

        </div>

      </form>

      <?php

        $crearDocente = new ControladorDocentes(); 
        $crearDocente -> ctrCrearDocente();    

      ?>      

    </div>

  </div>

</div>




<!--=====================================
    MODAL EDITAR DOCENTE
======================================-->

<div id="modalEditarDocente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#006400; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Docente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDocente" id="editarDocente" required>
                <input type="hidden" id="idDocente" name="idDocente">  
              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-address-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApellidoPaterno" id="editarApellidoPaterno" required>

              </div>

            </div>         
            
            <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-address-book" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApellidoMaterno" id="editarApellidoMaterno" required>

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


          </div>

        </div>

        <!--=====================================
                PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar cambios</button>

        </div>


      </form>

      <?php

        $editarDocente = new ControladorDocentes(); 
        $editarDocente -> ctrEditarDocente();

      ?>

    </div>

  </div>

</div>

  <?php

    $eliminarDocente = new ControladorDocentes(); 
    $eliminarDocente -> ctrEliminarDocente();

  ?>

