<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Especialidad
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Especialidad</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEspecialidad">

          Agregar Especialidad
          
        </button>

      </div>

      <!--Tabla de los docentes -->
      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>

              <th>Nombre</th>

              <th>Acciones</th>

            </tr>
            
          </thead>

<!--==============================================
          CUERPO DE LA TABLA   
=================================================-->          
          <tbody>

          <?php

              $item = null;
              $valor = null;

              $especialidad = ControladorEspecialidad::ctrMostrarEspecialidad($item, $valor);

              foreach ($especialidad as $key => $value) {
           
                echo ' <tr>

                      <td>'.($key+1).'</td>

                      <td class="text-uppercase">'.$value["especialidad"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditarEspecialidad" idEspecialidad="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEspecialidad"><i class="fa fa-pencil"></i></button>';

                          if($_SESSION["perfil"] == "Administrador"){

                            echo '<button class="btn btn-danger btnEliminarEspecialidad" idEspecialidad="'.$value["id"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>';

                          }

                        echo '</div>  

                      </td>

                    </tr>';
               }

           ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--==========================================
       MODAL PARA AGREGAR ESPECIALIDAD
=============================================-->

  <!-- Modal -->
  <div id="modalAgregarEspecialidad" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <!-- Modal contenido-->
      <div class="modal-content">

      <form role="form" method="post"> <!----Metodo POST--->

        <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#006400; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Especialidad</h4>

          </div>

        <!--=====================================
               CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

              <div class="box body">

        <!--=====================================
            ENTRADA PARA EL NOMBRE
        ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"> <i class="fa fa-th" ></i></span>

                  <input type="text" class="form-control input-lg" name="nuevaEspecialidad" placeholder="Ingresar Especialidad" required>

                </div>

              </div>

              
            </div>
            
          </div>    

          <!--=====================================
                          PIE DEL MODAL  
          ======================================-->
          
            <div class="modal-footer"> 

              <!-- Acciones -->
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-success">Guardar Especialidad</button>

            </div>

            <?php

              $crearEspecialidad = new ControladorEspecialidad(); 
              $crearEspecialidad -> ctrCrearEspecialidad();    

            ?>

      </form>

    </div>

  </div>
    
</div>


<!--==========================================
       MODAL PARA EDITAR ESPECIALIDAD
=============================================-->

  <!-- Modal -->
  <div id="modalEditarEspecialidad" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <!-- Modal contenido-->
      <div class="modal-content">

      <form role="form" method="post"> <!----Metodo POST--->

        <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#006400; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Especialidad</h4>

          </div>

        <!--=====================================
               CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

              <div class="box body">

        <!--=====================================
            ENTRADA PARA EL NOMBRE
        ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"> <i class="fa fa-th"></i></span>

                  <input type="text" class="form-control input-lg" name="editarEspecialidad" id="editarEspecialidad" required>

                  <input type="hidden" name="idEspecialidad" id="idEspecialidad" required>

                </div>

              </div>

              
            </div>
            
          </div>    

          <!--=====================================
                          PIE DEL MODAL  
          ======================================-->
            <div class="modal-footer"> 

              <!-- Acciones -->
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-success">Guardar Cambios</button>

            </div>

              <?php

                $editarEspecialidad = new ControladorEspecialidad(); 
                $editarEspecialidad -> ctrEditarEspecialidad();    

              ?>

      </form>

    </div>

  </div>
    
</div>

<?php

$BorrarEspecialidad = new ControladorEspecialidad(); 
$BorrarEspecialidad -> ctrBorrarEspecialidad();    

?>